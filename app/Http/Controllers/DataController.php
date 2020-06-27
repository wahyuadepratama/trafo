<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Project;
use App\PoleAttribute;
use App\Exports\DataExport;
use Excel;

class DataController extends Controller
{
    public function index()
    {
      if (isset($_GET['project_id'])) {
        $id = $_GET['project_id'];
      }else {
        return response()->json([
          'success' => false
        ]);
      }
      return $data = Data::where('project_id', $id)->get();
    }

    public function create(Request $request)
    {
      $data = new Data();

      if ($request->hasFile('pole_photo')){
        $imageName = time().'.png';
        $request->pole_photo->move(public_path('upload/pole'), $imageName);
        $data->pole_photo = '/upload/pole/'. $imageName;
      }

      if ($request->hasFile('foundation_photo')){
        $imageName = time().'.png';
        $request->foundation_photo->move(public_path('upload/foundation'), $imageName);
        $data->foundation_photo = '/upload/foundation/'. $imageName;
      }

      if ($request->hasFile('transformer_photo')){
        $imageName = time().'.png';
        $request->transformer_photo->move(public_path('upload/transformer'), $imageName);
        $data->transformer_photo = '/upload/transformer/'. $imageName;
      }

      $data->project_id = $request->project_id;
      $data->name = str_replace('"', "", $request->name);
      $data->lat = $request->lat;
      $data->lang = $request->lang;
      $data->pole_type = str_replace('"', "", $request->pole_type);
      $data->pole_construction = str_replace('"', "", $request->pole_construction);
      $data->is_trafo_input = $request->is_trafo_input;

      if ($request->is_trafo_input == 1) {
        $data->transformer_power = $request->transformer_power;
        $data->fasa = $request->fasa;
      }

      $data->save();

      for ($i=0; $i < count($request->attribute); $i++) {
        PoleAttribute::create([
          'name' => str_replace('"', "", $request->attribute[$i]),
          'data_id' => $data->id
        ]);
      }

      return response()->json([
        'success' => true,
        'message' => 'Berhasil menambah data'
      ]);
    }

    public function update(Request $request)
    {
      $data = Data::where('id', $request->id)->first();
      if ($request->hasFile('pole_photo')){
        if (file_exists(public_path($user->pole_photo))) {
           @unlink(public_path($data->pole_photo));
        }
        $imageName = time().'.png';
        $request->pole_photo->move(public_path('upload/pole'), $imageName);
        $data->pole_photo = '/upload/pole/'. $imageName;
      }

      if ($request->hasFile('foundation_photo')){
        if (file_exists(public_path($user->foundation_photo))) {
           @unlink(public_path($data->foundation_photo));
        }
        $imageName = time().'.png';
        $request->foundation_photo->move(public_path('upload/foundation'), $imageName);
        $data->foundation_photo = '/upload/foundation/'. $imageName;
      }

      if ($request->hasFile('transformer_photo')){
        if (file_exists(public_path($user->transformer_photo))) {
           @unlink(public_path($data->transformer_photo));
        }
        $imageName = time().'.png';
        $request->transformer_photo->move(public_path('upload/transformer'), $imageName);
        $data->transformer_photo = '/upload/transformer/'. $imageName;
      }

      $data->project_id = $request->project_id;
      $data->name = str_replace('"', "", $request->name);
      // $data->lat = $request->lat;
      // $data->lang = $request->lang;
      $data->pole_type = str_replace('"', "", $request->pole_type);
      $data->pole_construction = str_replace('"', "", $request->pole_construction);
      $data->is_trafo_input = $request->is_trafo_input;

      if ($request->is_trafo_input == 1) {
        $data->transformer_power = $request->transformer_power;
        $data->fasa = $request->fasa;
      }

      $data->save();

      PoleAttribute::where('data_id', $data->id)->delete();
      for ($i=0; $i < count($request->attribute); $i++) {
        PoleAttribute::create([
          'name' => str_replace('"', "", $request->attribute[$i]),
          'data_id' => $data->id
        ]);
      }

      return response()->json([
        'success' => true,
        'message' => 'Berhasil update data'
      ]);
    }

    public function delete(Request $request)
    {
      $data = Data::where('id', $request->id)->first();
      $data->delete();

      return response()->json([
        'success' => true,
        'message' => 'Berhasil menghapus data'
      ]);
    }

    public function indexPole()
    {
      if (isset($_GET['data_id'])) {
        $id = $_GET['data_id'];
      }else {
        return response()->json([
          'success' => false
        ]);
      }
      return $data = PoleAttribute::where('data_id', $id)->get();
    }

    public function downloadExcel($id)
    {
      $project = Project::where('id', $id)->first();
      return Excel::download(new DataExport($id), $project->name.'.xlsx');
    }
}
