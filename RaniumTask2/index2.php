<html>
<head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<style>
.modal-header {
  padding: 0;
}
.modal-header .close {
  padding: 10px 15px;
}
.modal-header ul {
  border: none;
}
.modal-header ul li {
  margin: 0;
}
.modal-header ul li a {
  border: none;
  border-radius: 0;
}
.modal-header ul li.active a {
  color: #e12f27;
}
.modal-header ul li a:hover {
  border: none;
}
.modal-header ul li a span {
  margin-left: 10px;
}
.modal-body .form-group {
  margin-bottom: 10px;
}
</style>
</head>
<!------ Include the above in your HEAD tag ---------->



<body>

<div class="container">
	<div class="row">

                        <!-- Signin & Signup -->
                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target=".login-register-form">
                           Login - Registration Modal
                        </a>

                        <!-- Login / Register Modal-->
                        <div class="modal fade login-register-form" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="tab-pane fade in active">
                                                <form action="/">
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pwd">Password:</label>
                                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Login</button>
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
                                                <form action="/">
                                                    <div class="form-group">
                                                        <label for="name">Your Name:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newemail">Email:</label>
                                                        <input type="email" class="form-control" id="newemail" placeholder="Enter new email" name="newemail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newpwd">Password:</label>
                                                        <input type="password" class="form-control" id="newpwd" placeholder="New password" name="newpwd">
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Register</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
	</div>
</div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container pb-modalreglog-container">
    <div class="row">
        <div class="col-xs-12 col-md-4 offset-md-4">
            <legend class="pb-modalreglog-legend">Modal registration form</legend>
            <div class="input-group pb-modalreglog-input-group">
                <button class="btn btn-primary pb-modalreglog-submit" data-toggle="modal" data-target="#myModal">Login</button>
                <button class="btn btn-primary pb-modalreglog-submit" data-toggle="modal" data-target="#myModal2">Register</button>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Login form</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input type="password" class="form-control" id="pws" placeholder="Password">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Registration form</h4>
                        </div>
                        <div class="modal-body">
                            <form class="pb-modalreglog-form-reg">
                                <div class="form-group">
                                    <div id="pb-modalreglog-progressbar"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" class="form-control" id="inputPws" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm password</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" class="form-control" id="inputConfirmPws" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                                        <input type="text" class="form-control" id="countries" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <div class="input-group pb-modalreglog-input-group">
                                        <input id="age">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="ch" name="chs">
                                    I agree with <a href="#">terms and conditions.</a>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-modalreglog-footer">
        <p>Design provided by <a href="https://www.prepbootstrap.com">PrepBootstrap</a></p>
    </div>
</div>

<style>
    .pb-modalreglog-container
    {
        margin-top: 100px;
    }

    .pb-modalreglog-legend
    {
        text-align: center;
    }

    .pb-modalreglog-input-group
    {
        margin: auto;
    }

    .pb-modalreglog-submit
    {
        margin-left: 5px;
    }

    .pb-modalreglog-form-reg
    {
        text-align: center;
    }

    .pb-modalreglog-footer p
    {
        text-align: center;
        margin-top: 20px;
    }

    #pb-modalreglog-progressbar
    {
        border-radius: 2px;
    }
</style>

<script>
    $(function () {
        var progress = $("#pb-modalreglog-progressbar").shieldProgressBar({
            value: 0
        }).swidget();

        $('#inputEmail').change(function () {
            if ($('#inputEmail').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputPws').change(function () {
            if ($('#inputPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#inputConfirmPws').change(function () {
            if ($('#inputConfirmPws').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#countries').change(function () {
            if ($('#countries').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#age').change(function () {
            if ($('#age').val().length > 1) {
                progress.value(progress.value() + 15);
            } else {
                progress.value(progress.value() - 15);
            }
        });

        $('#ch').change(function () {
            if ($('input[name="chs"]:checked').length > 0) {
                progress.value(progress.value() + 25);
            } else {
                progress.value(progress.value() - 25);
            }
        });

        $("#age").shieldMaskedTextBox({
            enabled: true,
            mask: "00/00/0000",
            value: "19/03/1032"
        });
    })
</script>

<h3> heading </h1>
<h4> heading </h4>
<h5> heading </h5>
normal
</body>
</html>
