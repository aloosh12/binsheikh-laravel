<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page_heading = "Career";
        $search_text  = $_GET['search_text'] ?? '';
        $career       = Career::where(['deleted' => 0])->orderBy('created_at', 'desc');
        if ($search_text) {
            $career = $career->whereRaw("(name like '%$search_text%')");
        }
        $careers = $career->get();
        // dd($career);
        return view('admin.career.list', compact('page_heading', 'careers', 'search_text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $page_heading   = "Career";
        $mode           = "create";
        $id             = "";
        $name           = "";
        $name_ar        = "";
        $description    = "";
        $description_ar = "";

        $active = "1";

        return view("admin.career.create", compact('page_heading', 'mode', 'id', 'name', 'active', 'name_ar', 'description', 'description_ar'));
    }

    public function store(Request $request)
    {
        $status      = "0";
        $message     = "";
        $o_data      = [];
        $errors      = [];
        $redirectUrl = '';

        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'name_ar'        => 'required',
            'description'    => 'required',
            'description_ar' => 'required',

        ]);
        if ($validator->fails()) {
            $status  = "0";
            $message = "Validation error occured";
            $errors  = $validator->messages();
        } else {
            $input = $request->all();

            $ins = [
                'name'           => $request->name,
                'name_ar'        => $request->name_ar,
                'active'         => $request->active,
                'description'    => $request->description,
                'description_ar' => $request->description_ar,

            ];

            if ($request->id != "") {
                $dest_id           = $request->id;
                $career            = Career::find($request->id);
                $ins['updated_at'] = gmdate('Y-m-d H:i:s');
                $career->update($ins);
                $status  = "1";
                $message = "Career updated succesfully";
            } else {
                $ins['created_at'] = gmdate('Y-m-d H:i:s');
                $prd               = Career::create($ins);
                $dest_id           = $prd->id;
                $status            = "1";
                $message           = "Career added successfully";
            }
        }
        echo json_encode(['status' => $status, 'message' => $message, 'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $career = Career::find($id);
        if ($career) {
            $page_heading = "Career";
            $mode         = "edit";
            $id           = $career->id;

            $name    = $career->name;
            $name_ar = $career->name_ar;

            $active         = $career->active;
            $description    = $career->description;
            $description_ar = $career->description_ar;

            return view("admin.career.create", compact('page_heading', 'mode', 'id', 'name', 'name_ar', 'active', 'description', 'description_ar'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status  = "0";
        $message = "";
        $o_data  = [];

        $career = Career::find($id);
        if ($career) {
            $career->deleted    = 1;
            $career->active     = 0;
            $career->updated_at = gmdate('Y-m-d H:i:s');
            $career->save();
            $status  = "1";
            $message = "Career removed successfully";
        } else {
            $message = "Something went wrong";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);

    }
    public function change_status(Request $request)
    {
        $status  = "0";
        $message = "";
        if (Career::where('id', $request->id)->update(['active' => $request->status])) {
            $status = "1";
            $msg    = "Successfully activated";
            if (! $request->status) {
                $msg = "Successfully deactivated";
            }
            $message = $msg;
        } else {
            $message = "Sorry!.. Something went wrong";
        }
        echo json_encode(['status' => $status, 'message' => $message]);
    }

    public function applications()
    {

        $page_heading = "Career Applications";
        $search_text  = $_GET['search_text'] ?? '';
        $from  = $_GET['from'] ?? '';
        $to  = $_GET['to'] ?? '';

        $applications       = CareerApplication::with('career')->where(['deleted' => 0])->orderBy('created_at', 'desc');
        if ($search_text) {
            $applications = $applications->whereRaw("(name like '%$search_text%' OR email like '%$search_text%' OR phone like '%$search_text%')");
        }
        // Apply date range filter
        if ($from && $to) {
            $from = \Carbon\Carbon::parse($from)->startOfDay()->toDateTimeString();
            $to = \Carbon\Carbon::parse($to)->endOfDay()->toDateTimeString();
            $applications = $applications->whereBetween('created_at', [$from, $to]);
        }
        $applications = $applications->paginate(10);
        return view('admin.career.applications', compact('page_heading', 'applications', 'search_text'));
    }

    public function delete_application($id)
    {
        $status  = "0";
        $message = "";
        $o_data  = [];

        $dt = CareerApplication::find($id);
        if ($dt) {
            $dt->deleted    = 1;
            $dt->updated_at = gmdate('Y-m-d H:i:s');
            $dt->save();
            $status  = "1";
            $message = "Application removed successfully";
        } else {
            $message = "Something went wrong";
        }

        echo json_encode(['status' => $status, 'message' => $message, 'o_data' => $o_data]);

    }

    public function deleteAll(Request $request)
    {
        //Log::info($request->all());
        if ($request->has('delete_all_id')) {
            $ids = explode(',', $request->delete_all_id);

            CareerApplication::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', 'Selected applications deleted successfully.');
        }
        return redirect()->back()->with('error', 'No Application selected.');
    }

    public function downloadCSV(Request $request)
    {
        if ($request->has('download_csv_id')) {
            $ids = explode(',', $request->download_csv_id);
            $applications = CareerApplication::with('career')
                ->whereIn('id', $ids)
                ->get();
            
            if ($applications->isEmpty()) {
                return redirect()->back()->with('error', 'No applications found.');
            }

            // Create a temporary file
            $tempFile = tempnam(sys_get_temp_dir(), 'applications_');
            $handle = fopen($tempFile, 'w');

            // Add UTF-8 BOM for proper Excel encoding
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // Add headers
            fputcsv($handle, [
                'Name',
                'Email',
                'Phone',
                'Position',
                'Applied On',
                'CV Link'
            ]);

            // Add data rows
            foreach ($applications as $application) {
                fputcsv($handle, [
                    $application->name,
                    $application->email,
                    $application->phone,
                    $application->career->name ?? 'N/A',
                    $application->created_at->format('d-M-Y h:i A'),
                    $application->cv ? url($application->cv) : 'N/A'
                ]);
            }

            fclose($handle);

            // Generate filename
            $filename = 'career_applications_' . date('Y-m-d_H-i-s') . '.csv';

            // Return the file as a download
            return response()->download($tempFile, $filename, [
                'Content-Type' => 'text/csv',
            ])->deleteFileAfterSend(true);
        }
        
        return redirect()->back()->with('error', 'No applications selected.');
    }

}
