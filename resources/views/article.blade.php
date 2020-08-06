<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>excel import</title>
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/js/script.js') }}"></script>
</head>
<body>
<header>
    <h2>Pure HTML5 file upload</h2>

</header>
<div class="container">
    <div class="contr"><h2>You can select the file (excel) and click Upload button</h2></div>

    <div class="upload_form_cont">
        <form id="upload_form" enctype="multipart/form-data" method="post" action="{{ route('article.store') }}">
            {{ csrf_field() }}
            <div>
                <div><label for="image_file">Please select excel file</label></div>
                <div><input type="file" name="excel_file" id="excel_file" onchange="fileSelected();" /></div>
            </div>
            <div>
                <input type="button" value="Upload" onclick="startUploading()" />
            </div>
            <div id="fileinfo">
                <div id="filename"></div>
                <div id="filesize"></div>
                <div id="filetype"></div>
                <div id="filedim"></div>
            </div>
            <div id="error">You should select valid excel files only!</div>
            <div id="error2">An error occurred while uploading the file</div>
            <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
            <div id="warnsize">Your file is very big. We can't accept it. Please select more small file</div>

            <div id="progress_info">
                <div id="progress"></div>
                <div id="progress_percent">&nbsp;</div>
                <div class="clear_both"></div>
                <div>
                    <div id="speed">&nbsp;</div>
                    <div id="remaining">&nbsp;</div>
                    <div id="b_transfered">&nbsp;</div>
                    <div class="clear_both"></div>
                </div>
                <div id="upload_response"></div>
            </div>
        </form>

        <div id="preview" />
    </div>
</div>
</body>
</html>
