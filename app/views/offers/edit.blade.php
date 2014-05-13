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

{{ Form::model($offer, array('route' => array('offers.update', $offer->id), 'method' => 'PUT', 'files' => true))}}

<header>

    Add Offer
    <label style="float:right;" class="toggle">
        {{ Form::label('adkoffer', ' ', array('class' => 'toggle')) }}
        {{ Form::checkbox('adkoffer') }}
        <i data-swchon-text="YES" data-swchoff-text="NO"></i>Adknowledge Offer</label>

</header>

<fieldset>


    <section>
        <div class="col col-6">
            <label class="label">Offer Name</label>
            <label class="input">
                {{ Form::text('offerName') }}
            </label>
        </div>

        <div class="col col-6">
            <label class="label">Choose a Network</label>
            <label class="select">
                {{ Form::select('network_id', array('0' => 'OB Media', '1' => 'Adknowledge', '2' => 'Adconion', '3' => 'Riip')) }}
                <i></i> </label>

        </div>


    </section>




</fieldset>

<fieldset>


    <section>
        <div class="col col-6">
            <label class="label">Subject Lines</label>
            <label class="textarea">
                {{ Form::textarea('subjectLines', html_entity_decode($offer->subjectLines), array('class' => 'custom-scroll', 'rows' => '10')) }}
            </label>
            <div class="note">
                <strong>Note:</strong> Enter as many as you'd like.
            </div>
        </div>

        <div class="col col-6">
            <label class="label">From Line</label>
            <label class="input">
                {{ Form::text('fromLine') }}
            </label>
            <div class="note">
                <strong>Note:</strong> This is the xxxxx@domain.com
            </div
            <label class="label">Friendly From Lines</label>
            <label class="textarea">
                {{ Form::textarea('friendlyFromLines', html_entity_decode($offer->friendlyFromLines), array('class' => 'custom-scroll', 'rows' => '6')) }}
            </label>
        </div>


    </section>




</fieldset>

<fieldset>


    <section>
        <div class="col col-6">
            <label class="label">Affiliate Link</label>
            <label class="input">
                {{ Form::text('affiliateLink') }}
            </label>

        </div>

        <div class="col col-6">
            <label class="label">Offer Unsubscribe</label>
            <label class="input">
                {{ Form::text('offerUnsubscribe') }}
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

                <div action="upload.php" class="dropzone" id="mydropzone"></div>

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
                                {{ Form::textarea('html1', ' ', array('class' => 'custom-scroll', 'rows' => '23')) }}
                            </label>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="s2">
                        <label class="textarea">
                            {{ Form::textarea('html2', ' ', array('class' => 'custom-scroll', 'rows' => '23')) }}
                        </label>
                    </div>
                    <div class="tab-pane fade" id="s3">
                        <label class="textarea">
                            {{ Form::textarea('html3', ' ', array('class' => 'custom-scroll', 'rows' => '23')) }}
                        </label>
                    </div>
                    <div class="tab-pane fade" id="s4">
                        <label class="textarea">
                            {{ Form::textarea('text1', ' ', array('class' => 'custom-scroll', 'rows' => '23')) }}
                        </label>
                    </div>

                </div>

            </div>

        </div>
    </section>

</fieldset>

<footer>
    {{ Form::submit('Create Offer!', array('class' => 'btn btn-primary')) }}

    <button type="button" class="btn btn-default" onclick="window.history.back();">
        Back
    </button>
</footer>

{{ Form::close() }}

</div>
<!-- end widget content -->

</div>
<!-- end widget div -->

</div></article>
<!-- END COL -->


</div>
@stop