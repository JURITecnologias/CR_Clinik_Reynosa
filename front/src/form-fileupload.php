<?php ob_start();?>

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content pb-0">

            <!-- Page Header -->
            <div class="breadcrumb-arrow mb-4">
                <h4 class="mb-1">File Uploads</h4>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>                            
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Form Elements</a></li>                            
                        <li class="breadcrumb-item active">File Uploads</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Dropzone File Upload</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                    </p>
                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                        <div class="fallback">
                            <input name="file" type="file" multiple>
                        </div>
                        <div class="dz-message needsclick">
                            <i class="ti ti-cloud-upload h1 text-muted"></i>
                            <h3>Drop files here or click to upload.</h3>
                            <span class="text-muted fs-13">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                        </div>
                    </form>

                    <!-- Preview -->
                    <div class="dropzone-previews" id="file-previews"></div>

                </div> <!-- end card-body -->                    
            </div>  <!-- end card -->               

            <!-- file preview template -->
            <div class="d-none" id="uploadPreviewTemplate">
                <div class="card mt-2 mb-0 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                            </div>
                            <div class="col ps-0">
                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                <p class="mb-0" data-dz-size></p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                    <i class="ti ti-x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->       
            </div>
                            
        </div>
        <!-- End Content -->   

        <?php require_once '../partials/footer.php'; ?>

    </div>

    <!-- ========================
        End Page Content
    ========================= -->

<?php
$content = ob_get_clean();

require_once '../partials/main.php';?>