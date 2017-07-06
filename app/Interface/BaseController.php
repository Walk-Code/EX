<?php
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: jianqi
 * Date: 2017/7/6
 * Time: 17:05
 */
interface BaseController
{
    public function index(Request $request);

    public function create();

    public function store(Request $request);

    public function show();

}