<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\BindingResolutionException;

class DosenController extends Controller
{
    public function index(){
        return "Halo ini adalah method index, dalam controller DosenController. - www.malasngoding.com";
    }
}
