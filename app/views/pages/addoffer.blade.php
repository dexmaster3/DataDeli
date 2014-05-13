@extends('layouts.layout')
@section('content')
<div class="row">

<!-- NEW COL START -->
<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

<!-- Widget ID (each widget will need unique ID)-->

<!-- end widget -->

<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">
<!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                                -->
<header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="#" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-resize-full "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div>
    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
    <h2>Add/Edit Offer </h2>

    <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

<!-- widget div-->
<div role="content">

<!-- widget edit box -->
<div class="jarviswidget-editbox">
    <!-- This area used as dropdown edit box -->

</div>
<!-- end widget edit box -->

<!-- widget content -->
<div class="widget-body no-padding">

<div class="smart-form">
<header>

    Add Offer
    <label style="float:right;" class="toggle">
        <input type="checkbox" name="checkbox-toggle" checked="checked">
        <i data-swchon-text="NO" data-swchoff-text="YES"></i>Adknowledge Offer</label>

    </header>

    <fieldset>


    <section>
        <div class="col col-6">
        <label class="label">Offer Name</label>
        <label class="input">
            <input type="text" maxlength="10">
        </label>
            </div>

            <div class="col col-6">
                <label class="label">Choose a Network</label>
                <label class="select">
                    <select>
                        <option value="0">OB Media</option>
                        <option value="1">Adknowledge</option>
                        <option value="2">Adconion</option>
                        <option value="3">Riip</option>
                    </select> <i></i> </label>

            </div>


    </section>




</fieldset>

<fieldset>


    <section>
        <div class="col col-6">
            <label class="label">Subject Lines</label>
            <label class="textarea">
                <textarea rows="10" class="custom-scroll"></textarea>
            </label>
            <div class="note">
                <strong>Note:</strong> Enter as many as you'd like.
            </div>
        </div>

        <div class="col col-6">
            <label class="label">From Line</label>
            <label class="input">
                <input type="text" maxlength="10">
            </label>
            <div class="note">
                <strong>Note:</strong> This is the xxxxx@domain.com
            </div
            <label class="label">Friendly From Lines</label>
            <label class="textarea">
                <textarea rows="6" class="custom-scroll"></textarea>
            </label>
        </div>


    </section>




</fieldset>

<fieldset>


    <section>
        <div class="col col-6">
            <label class="label">Affiliate Link</label>
            <label class="input">
                <input type="text" maxlength="10">
            </label>

        </div>

        <div class="col col-6">
            <label class="label">Offer Unsubscribe</label>
            <label class="input">
                <input type="text" maxlength="10">
            </label>

        </div>

<div style="width:100%;" class="col col-12">
    <label class="label">Upload Images</label>

    <!-- widget div-->


        <!-- widget edit box -->
        <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->

        </div>
        <!-- end widget edit box -->

        <!-- widget content -->
        <div class="widget-body">

            <form action="upload.php" class="dropzone" id="mydropzone"></form>

        </div>
        <!-- end widget content -->


    <!-- end widget div -->

</div>


    </section>











</fieldset>

<fieldset>

    <section>

        <div class="col col-3">
            <label class="label">Variables</label>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Variable Name</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Subject</td>
                    <td>{subject}</td>
                </tr>
                <tr>
                    <td>Friendly From</td>
                    <td>{ffrom}</td>
                </tr>
                <tr>
                    <td>From</td>
                    <td>{from}</td>
                </tr>
                <tr>
                    <td>Domain</td>
                    <td>{domain}</td>
                </tr>
                <tr>
                    <td>Junk Text</td>
                    <td>{junk}</td>
                </tr>
                <tr>
                    <td>Unsubscribe</td>
                    <td>{unsubscribe}</td>
                </tr>
                <tr>
                    <td>Affiliate Link</td>
                    <td>{afflink}</td>
                </tr>
                <tr>
                    <td>Image (Single)</td>
                    <td>{image,1}</td>
                </tr>
                <tr>
                    <td>Image (Multiple)</td>
                    <td>{mainimage,1,2}</td>
                </tr>
                <tr>
                    <td>Main Image (All)</td>
                    <td>{image,all}</td>
                </tr>
                <tr>
                    <td>Random Word</td>
                    <td>{randword}</td>
                </tr>
                <tr>
                    <td>Random Number</td>
                    <td>{randnumber}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col col-9">
            <div style="margin-bottom: 15px;" class="btn-group">
                <button  style="padding: 6px 12px;" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus"></i> Add <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript:void(0);">Add HTML Tab</a>
                    </li>
                    <li class="divider"></li>

                    <li>
                        <a href="javascript:void(0);">Add Text Tab</a>
                    </li>

                </ul>
            </div>



            <div class="widget-body">
                <ul id="myTab1" class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#s1" data-toggle="tab">HTML 1</a>
                    </li>
                    <li>
                        <a href="#s2" data-toggle="tab">HTML 2</a>
                    </li>
                    <li>
                        <a href="#s3" data-toggle="tab">HTML 3</a>
                    </li>
                    <li>
                        <a href="#s4" data-toggle="tab">Text 1</a>
                    </li>



                </ul>

                <div id="myTabContent1" class="tab-content padding-10">
                    <div class="tab-pane fade in active" id="s1">
                        <p>
                            <label class="textarea">
                                <textarea rows="23" class="custom-scroll"></textarea>
                            </label>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="s2">
                        <label class="textarea">
                            <textarea rows="23" class="custom-scroll"></textarea>
                        </label>
                    </div>
                    <div class="tab-pane fade" id="s3">
                        <label class="textarea">
                            <textarea rows="23" class="custom-scroll"></textarea>
                        </label>
                    </div>
                    <div class="tab-pane fade" id="s4">
                        <label class="textarea">
                            <textarea rows="23" class="custom-scroll"></textarea>
                        </label>
                    </div>

                </div>

            </div>

        </div>
    </section>

</fieldset>
<fieldset>

    <section>
        <label class="label">Select Large</label>
        <label class="select">
            <select class="input-lg">
                <option value="0">Choose name</option>
                <option value="1">Alexandra</option>
                <option value="2">Alice</option>
                <option value="3">Anastasia</option>
                <option value="4">Avelina</option>
            </select> <i></i> </label>
    </section>

    <section>
        <label class="label">Multiple select</label>
        <label class="select select-multiple">
            <select multiple="" class="custom-scroll">
                <option value="1">Alexandra</option>
                <option value="2">Alice</option>
                <option value="3">Anastasia</option>
                <option value="4">Avelina</option>
                <option value="5">Basilia</option>
                <option value="6">Beatrice</option>
                <option value="7">Cassandra</option>
                <option value="8">Clemencia</option>
                <option value="9">Desiderata</option>
            </select> </label>
        <div class="note">
            <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
        </div>
    </section>
</fieldset>

<fieldset>
    <section>
        <label class="label">Textarea</label>
        <label class="textarea">
            <textarea rows="3" class="custom-scroll"></textarea>
        </label>
        <div class="note">
            <strong>Note:</strong> height of the textarea depends on the rows attribute.
        </div>
    </section>

    <section>
        <label class="label">Textarea resizable</label>
        <label class="textarea textarea-resizable">
            <textarea rows="3" class="custom-scroll"></textarea>
        </label>
    </section>

    <section>
        <label class="label">Textarea expandable</label>
        <label class="textarea textarea-expandable">
            <textarea rows="3" class="custom-scroll"></textarea>
        </label>
        <div class="note">
            <strong>Note:</strong> expands on focus.
        </div>
    </section>
</fieldset>

<fieldset>
    <section>
        <label class="label">Columned radios</label>
        <div class="row">
            <div class="col col-4">
                <label class="radio">
                    <input type="radio" name="radio" checked="checked">
                    <i></i>Alexandra</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Alice</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Anastasia</label>
            </div>
            <div class="col col-4">
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Avelina</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Basilia</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Beatrice</label>
            </div>
            <div class="col col-4">
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Cassandra</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Clemencia</label>
                <label class="radio">
                    <input type="radio" name="radio">
                    <i></i>Desiderata</label>
            </div>
        </div>
    </section>

    <section>
        <label class="label">Inline radios</label>
        <div class="inline-group">
            <label class="radio">
                <input type="radio" name="radio-inline" checked="checked">
                <i></i>Alexandra</label>
            <label class="radio">
                <input type="radio" name="radio-inline">
                <i></i>Alice</label>
            <label class="radio">
                <input type="radio" name="radio-inline">
                <i></i>Anastasia</label>
            <label class="radio">
                <input type="radio" name="radio-inline">
                <i></i>Avelina</label>
            <label class="radio">
                <input type="radio" name="radio-inline">
                <i></i>Beatrice</label>
        </div>
    </section>
</fieldset>

<fieldset>
    <section>
        <label class="label">Columned checkboxes</label>
        <div class="row">
            <div class="col col-4">
                <label class="checkbox">
                    <input type="checkbox" name="checkbox" checked="checked">
                    <i></i>Alexandra</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Alice</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Anastasia</label>
            </div>
            <div class="col col-4">
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Avelina</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Basilia</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Beatrice</label>
            </div>
            <div class="col col-4">
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Cassandra</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Clemencia</label>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox">
                    <i></i>Desiderata</label>
            </div>
        </div>
    </section>

    <section>
        <label class="label">Inline checkboxes</label>
        <div class="inline-group">
            <label class="checkbox">
                <input type="checkbox" name="checkbox-inline" checked="checked">
                <i></i>Alexandra</label>
            <label class="checkbox">
                <input type="checkbox" name="checkbox-inline">
                <i></i>Alice</label>
            <label class="checkbox">
                <input type="checkbox" name="checkbox-inline">
                <i></i>Anastasia</label>
            <label class="checkbox">
                <input type="checkbox" name="checkbox-inline">
                <i></i>Avelina</label>
            <label class="checkbox">
                <input type="checkbox" name="checkbox-inline">
                <i></i>Beatrice</label>
        </div>
    </section>
</fieldset>

<fieldset>
    <div class="row">
        <section class="col col-5">
            <label class="label">Radio Toggles</label>
            <label class="toggle">
                <input type="radio" name="radio-toggle" checked="checked">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Alexandra</label>
            <label class="toggle">
                <input type="radio" name="radio-toggle">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Anastasia</label>
            <label class="toggle">
                <input type="radio" name="radio-toggle">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Avelina</label>
        </section>

        <div class="col col-2"></div>

        <section class="col col-5">
            <label class="label">Checkbox Toggles</label>
            <label class="toggle">
                <input type="checkbox" name="checkbox-toggle" checked="checked">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Cassandra</label>
            <label class="toggle">
                <input type="checkbox" name="checkbox-toggle">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Clemencia</label>
            <label class="toggle">
                <input type="checkbox" name="checkbox-toggle">
                <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Desiderata</label>
        </section>
    </div>
</fieldset>

<fieldset>
    <section>
        <label class="label">Ratings with different icons</label>
        <div class="rating">
            <input type="radio" name="stars-rating" id="stars-rating-5">
            <label for="stars-rating-5"><i class="fa fa-star"></i></label>
            <input type="radio" name="stars-rating" id="stars-rating-4">
            <label for="stars-rating-4"><i class="fa fa-star"></i></label>
            <input type="radio" name="stars-rating" id="stars-rating-3">
            <label for="stars-rating-3"><i class="fa fa-star"></i></label>
            <input type="radio" name="stars-rating" id="stars-rating-2">
            <label for="stars-rating-2"><i class="fa fa-star"></i></label>
            <input type="radio" name="stars-rating" id="stars-rating-1">
            <label for="stars-rating-1"><i class="fa fa-star"></i></label>
            Stars
        </div>

        <div class="rating">
            <input type="radio" name="trophies-rating" id="trophies-rating-7">
            <label for="trophies-rating-7"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-6">
            <label for="trophies-rating-6"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-5">
            <label for="trophies-rating-5"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-4">
            <label for="trophies-rating-4"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-3">
            <label for="trophies-rating-3"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-2">
            <label for="trophies-rating-2"><i class="fa fa-trophy"></i></label>
            <input type="radio" name="trophies-rating" id="trophies-rating-1">
            <label for="trophies-rating-1"><i class="fa fa-trophy"></i></label>
            Trophies
        </div>

        <div class="rating">
            <input type="radio" name="asterisks-rating" id="asterisks-rating-10">
            <label for="asterisks-rating-10"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-9">
            <label for="asterisks-rating-9"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-8">
            <label for="asterisks-rating-8"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-7">
            <label for="asterisks-rating-7"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-6">
            <label for="asterisks-rating-6"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-5">
            <label for="asterisks-rating-5"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-4">
            <label for="asterisks-rating-4"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-3">
            <label for="asterisks-rating-3"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-2">
            <label for="asterisks-rating-2"><i class="fa fa-asterisk"></i></label>
            <input type="radio" name="asterisks-rating" id="asterisks-rating-1">
            <label for="asterisks-rating-1"><i class="fa fa-asterisk"></i></label>
            Asterisks
        </div>
        <div class="note">
            <strong>Note:</strong> you can use more than 300 vector icons for rating.
        </div>
    </section>
</fieldset>

<footer>
    <button type="submit" class="btn btn-primary">
        Submit
    </button>
    <button type="button" class="btn btn-default" onclick="window.history.back();">
        Back
    </button>
</footer>
</form>

</div>
<!-- end widget content -->

</div>
<!-- end widget div -->

</div></article>
<!-- END COL -->


</div>
@stop