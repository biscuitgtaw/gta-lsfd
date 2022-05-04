@extends('master.app')

@section('title', __('core.about_this_project'))
@section('breadcrumb', __('core.home').'>'.__('core.about_this_project'))

@section('content')
    <div id="content-page" class="content-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h1>About this project</h1>
                    <p>Updated at 2022-05-04</p>

                    <p>Ho-kay, so before I go into any details, I'd like to mention that this entire project has been done by <b>one person</b> in their free time next to a full-time job and managing time between being a GTA:W Admin, Developer and part of FD Command.</p>

                    <p>This entire project is an <a href="https://github.com/biscuitgtaw/gta-lsfd">open-source project</a>, which means anyone can contribute to the code and willingly setup their own website without any permission. This project was made via Laravel 9.11 and my own front-end framework I created during my studies called Antelope.</p>

                    <p>In terms of support, I do not offer free support in the means of setting up your project for you, I may answer a few questions and may assist with the actual setup process with a fee. You are however, allowed to ask for support on our discord server. But unless negotiated, I am not committing myself to answering every single question asked by you.</p>

                    <p>At the time of writing, this project is still very much within it's early stages, therefor there's a lot that still has to be completed, I have a full to-do list as well as announcements of updates on my discord.</p>
                </div>
            </div>

        </div>

    </div>
@endsection
