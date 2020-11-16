<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SSHKeyService;
use App\Repositories\SSHKeyRepository;
use App\Models\SSHKey;

class SSHController extends Controller
{
    /**
     * Construct repository and service
     *
     * @param \App\Services\SSHKeyService $sshKeyService
     * @param \App\Repositories\SSHKeyRepository $sshKeyRepository
     *
     * @return void
     */
    public function __construct(
        SSHKeyService $sshKeyService,
        SSHKeyRepository $sshKeyRepository
    ) {
        $this->sshKeyService = $sshKeyService;
        $this->sshKeyRepository = $sshKeyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sshKeyService->formatKeyList();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->sshKeyService->submitProcessing($request);
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
        //
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
        $this->sshKeyService->softDelete($id);
    }
}
