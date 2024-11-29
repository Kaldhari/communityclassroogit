<!DOCTYPE html>
<html lang="en">
<head>
    <title>QR Code Generator</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
        body {
            margin: 0;
            background-color: #ecfab6;
        }
    </style>
</head>
<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0">User Information</h3>
                            </div>
                            <?php
                            $first_name = "Babaji";
                            $last_name = "Technical";
                            $email = "9182441793";
                            $company = "babajitechnical";

                            if (isset($_POST["btnsubmit"])) {
                                $first_name = $_POST["first_name"];
                                $last_name = $_POST["last_name"];
                                $phonenumber = $_POST["phonenumber"];
                                $company = $_POST["company"];
                            }
                            ?>
                            <div class="card-body">
                                <form autocomplete="off" class="form" role="form" action="index.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text"  name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" name="last_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Phonenumber</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="number"  name="phonenumber">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text"  name="company">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input class="btn btn-primary" type="submit" name="btnsubmit" value="Generate QR Code">
                                        </div>
                                    </div>
                                </form>
                                <?php
                                include "phpqrcode/qrlib.php";
                                $PNG_TEMP_DIR = 'temp/';
                                if (!file_exists($PNG_TEMP_DIR)) {
                                    mkdir($PNG_TEMP_DIR);
                                }

                                $filename = $PNG_TEMP_DIR . 'test.png';

                                if (isset($_POST["btnsubmit"])) {
                                    
                                    $codeString = "First Name: $first_name\n";
                                    $codeString .= "Last Name: $last_name\n";
                                    $codeString .= "Phonenumber: $phonenumber\n";
                                    $codeString .= "Company: $company\n";

                                    
                                    $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';
                                    QRcode::png($codeString, $filename);

                                
                                    echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
