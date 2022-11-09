<?php

namespace App\Http\Controllers\Marketings;

use App\Http\Controllers\Controller;
use App\Services\Marketings\CreateClientService;
use App\Http\Requests\Marketings\CreateClientRequest;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Marketings\ClientController;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * $clientService Implementation.
     * 
     * @var CreateClientService
     */
    private $clientService;

     /**
     * Constructor of the controller.
     * 
     * @param \App\Services\Employees\CreateClientService $clientService
     * @return void
     */
    public function __construct(CreateClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->clientService->getAllData();
        return view('marketings.client.index');
    }

    public function getList(Request $request)
    {
        if ($request->ajax()) {
            return $this->clientService->getAllDatatables($this->clientService->getAllData());
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketings.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        $validated = $request->validated();
        //dd($validated);
        $this->clientService->createData($validated);

        return redirect()->route('client.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data client berhasil di tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->clientService->getByIdData($id);

        return view('marketings.client.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->clientService->getByIdData($id);

        return view('marketings.client.edit', ['data' => $data]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateClientRequest $request, $id)
    {
        $validate = $request->validated();
        $data = $this->clientService->getByIdData($id);
        $this->clientService->updateData($id, $request->all());

        return redirect()->route('client.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data client berhasil di ubah']);
    }

    public function delete($id)
    {
        $data = $this->clientService->getByIdData($id);

        return view('marketings.client.delete', ['data' => $data]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->clientService->deleteData($id);

        return redirect()->route('client.index')->with(['response' => true, 'type' => 'success', 'title' => 'Berhasil!', 'alert' => 'success', 'message' => 'Data client berhasil di hapus']);
    }
}
