<?php

namespace App\Http\Controllers\GeneralAffairs;
use App\Http\Controllers\Controller;
use App\Services\GeneralAffairs\CreateAssetService;
use App\Http\Requests\GeneralAffairs\CreateAssetRequest;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\GeneralAffairs\AssetController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AssetController extends Controller
{
    
    /**
     * AssetService Implementation.
     * 
     * @var CreateAssetService
     */
    private $assetService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\GeneralAffairs\CreateAssetService $assetService
     * @return void
     */
    public function __construct(CreateAssetService $assetService)
    {
        $this->assetService = $assetService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->assetService->getAllData();
        return view('general_affairs.asset.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->assetService->getAllDatatables($this->assetService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('general_affairs.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAssetRequest $request)
    {
        $validated = $request->validated();
        $this->assetService->createData($request->all());

        return redirect()->route('assets.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data aset berhasil di tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->assetService->getByIdData($id);

        return view('general_affairs.asset.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->assetService->getByIdData($id);

        return view('general_affairs.asset.edit', ['data' => $data]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAssetRequest $request, $id)
    {
        $validate = $request->validated();
        $data = $this->assetService->getByIdData($id);
        $this->assetService->updateData($id, $request->all());

        return redirect()->route('assets.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data aset berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->assetService->getByIdData($id);

        return view('general_affairs.asset.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->assetService->deleteData($id);

        return redirect()->route('assets.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data aset berhasil di hapus']);
    }
}
