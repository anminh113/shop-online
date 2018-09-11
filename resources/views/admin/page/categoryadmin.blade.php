@extends('admin/master')

@section('head')
<link rel="stylesheet" href="source/admin/assets/css/product.css">
@endsection

@section('content')
<!-- MAIN -->
<div class="main">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Pictures</a></li>
        <li><a href="#">Summer 15</a></li>
        <li>Italy</li>
    </ul>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Category1</h3>
                </div>
                <div class="panel-body">
                    <button class="accordion">Section 1</button>
                    <div class="panelaccordion">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Steve</td>
                                    <td>Jobs</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Simon</td>
                                    <td>Philips</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jane</td>
                                    <td>Doe</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="accordion">Section 2</button>
                    <div class="panelaccordion">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Steve</td>
                                    <td>Jobs</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Simon</td>
                                    <td>Philips</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jane</td>
                                    <td>Doe</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="accordion">Section 3</button>
                    <div class="panelaccordion">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Steve</td>
                                    <td>Jobs</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Simon</td>
                                    <td>Philips</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jane</td>
                                    <td>Doe</td>
                                    <td><a href="detail-product.html" class=""><span>@steve</span></a></td>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-block">Button Block</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning btn-block">Button Block</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3>Category2</h3>
                </div>
                <div class="panel-body">
                    <button class="accordion">Section 1</button>
                    <div class="panelaccordion">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <button class="accordion">Section 2</button>
                    <div class="panelaccordion">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <button class="accordion">Section 3</button>
                    <div class="panelaccordion">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="space10">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-block">Button Block</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning btn-block">Button Block</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection

@section('footer')
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active1");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
    </script>
@endsection
       