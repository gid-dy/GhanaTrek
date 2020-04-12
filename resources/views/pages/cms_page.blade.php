<?php
use App\Tourpackages;
?>
@extends('layouts.frontLayout.userdesign')
    @section('content')
    <section>
        <div class="container">
            <div class="col-xs-12">
                <p><?php echo nl2br($cmsPagesDetails->Description); ?></p>
            </div>
        </div>
    </section>

   @endsection






