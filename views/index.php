<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Justify framework</title>

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/adaptive.css">
    <link rel="stylesheet" href="assets/libs/bootstrap/bootstrap.min.css">
</head>
    <body>
        <div class="wrapper">
            <div class="content">
                <div class="navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="/" class="navbar-brand">Justify</a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="container">
                        <div class="starter-template">
                            <h1>Welcome!</h1>
                            <p class="lead">
                                You successful installed
                                <?= $frameworkName ?>
                                <?= $frameworkVersion ?>!
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Example</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>About</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>Contacts</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum explicabo id illo inventore
                                    ipsam magni
                                    non nulla omnis quisquam vero? Corporis debitis eius esse ipsam ipsum iusto perferendis
                                    tenetur
                                    voluptatem!
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <footer>
                <hr>
                <div class="container">
                    <p>&copy; <?= $frameworkName ?> <?= date('Y') ?></p>
                </div>
            </footer>
        </div>
    </body>
</html>