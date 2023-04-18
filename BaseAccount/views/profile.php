<link rel="stylesheet" href="../css/profile.css">

</head>

<body>
    <div id="mainBox" class="container-fluid">

        <!-- sticky label in the left -->
        <div id="stickyLabelLeft" class="container">
            <div class="itemAva" >
                <div class="boxInnerImage">
                    <div class="innerImage">
                        <img id="miniAvatar" src="<?php echo $userP->getImage() ?>">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="iconLabel" >
                    <div class="icon">
                        <i style="color: #fff; font-size:24px" class='far fa-address-card'></i>
                    </div>
                </div>
                <div class="info">
                    Cá nhân
                </div>
            </div>

            <div class="item">
                <div class="iconLabel" >
                    <div class="icon" >
                        <i class='far fa-bell' style='font-size:24px; color:#888'></i>
                    </div>
                </div>
                <div class="info" style="color: #888;">
                    Thông báo
                </div>
            </div>

            <div class="item">
                <div class="iconLabel" >
                    <div class="icon" >
                        <i class='fas fa-user-friends' style='font-size:24px;color:#888 '></i>
                    </div>
                </div>
                <div class="info" style="color: #888;">
                    Thành viên
                </div>
            </div>

            <div class="item">
                <div class="iconLabel" >
                    <div class="icon" >
                        <i class='fas fa-balance-scale' style='font-size:24px; color: #888;'></i>
                    </div>
                </div>
                <div class="info" style="color: #888;">
                    Nhóm
                </div>
            </div>

            <div class="item">
                <div class="iconLabel" >
                    <div class="icon">
                        <i class='far fa-flag' style='font-size:24px; color:#888'></i>
                    </div>
                </div>
                <div class="info" style="color: #888;">
                    TK Khách
                </div>
            </div>
            <div class="item">
                <div class="iconLabel" >
                    <div class="icon" >
                        <i class='fas fa-globe' style='font-size:24px; color: #888;'></i>
                    </div>
                </div>
                <div class="info" style="color: #888;">
                    Ứng dụng
                </div>
            </div>

            <div class="item" style="position: relative; bottom: 20px; left: 0px; ">
                <div class="iconLabel">
                    <div class="icon" >

                    </div>
                </div>
                <div class="info" style="color:#888" >
                    <a class="nav-link" aria-current="page" href="/logout" id="logoutName" style="margin-top: 35px;">
                        Đăng xuất
                    </a>
                </div>
            </div>

        </div>

        <!-- navbar navigation and detail informations -->
        <div id="navbarNavigation" class="container">
            <!-- navbar navigation -->
            <nav class="navbar navbar-expand-lg" id="navbarTutorial">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/login"><-- </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="display: block;">

                                    <?php

                                    use app\core\Application;

                                    if (!Application::isGuest()) {
                                    ?>
                                        <li class="nav-item">
                                            <a class="nav-link nav-link-account" aria-current="page">Tài khoản</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link nav-link-name" aria-current="page" id="navbarName">
                                                <?php echo Application::$app->user->getDisplayName() ?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                                <?php
                                if (Application::isGuest()) {

                                ?>
                                    <ul class="navbar-nav navbarIsGuest me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="/login">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="/register">Register</a>
                                        </li>
                                    </ul>
                                <?php } else {

                                ?>
                                    <ul id="ulEditButton" class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item" style="margin-top: -5px;">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" id="open-popup-btn">
                                                <i class='fas fa-arrow-up'></i>
                                                Chỉnh sửa tài khoản
                                            </button>
                                        </li>

                                    </ul>
                                <?php } ?>
                            </div>
                </div>
            </nav>
            <!-- detail infomation -->
            <div class="container" style="display: flex; margin-top:30px; ">
                <div class="container" style="width: 25%;">

                </div>
                <div class="container" style="display: flex;">

                    <!-- avatar -->
                    <div class="container" style="width: 20%;">                        
                        <label for="imageMain">
                            <img id="uploadImageFinished" width="120px" height="120px" src=" <?php echo $userP->getImage() ?>"> <!-- ../images/OIP.jpg -->
                        </label>
                        <form id="imageUploadForm" enctype="multipart/form-data">
                            <input type="file" accept=".jpg, .png" id="imageMain" name="image"/>
                        </form>



                    </div>
                    <!-- content -->
                    <div id="contentBoxInfomation" class="container" >
                        <div class="contentBoxInfomationName"  id="fullNameMain">
                            <?php echo $userP->getDisplayName() ?>
                        </div>
                        <div style="font-size: 16px;font-weight: 200;">Owner</div>
                        <div style="display: flex; flex-direction:row">
                            <div class="contentBoxInfomation">Địa chỉ email</div>
                            <div id="emailMain">
                                <?php echo $userP->getEmail(); ?>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction:row">
                            <div  class="contentBoxInfomation">Số điện thoại</div>
                            <div id="phoneMain">
                                <?php echo $userP->getPhone(); ?>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- sub infomation -->
            <div id="subInformationBox" class="container">
                <div class="container" style="width: 30%;">

                </div>
                <div class="container subInformationBoxCenter" >

                    <!-- content -->
                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            THÔNG TIN LIÊN HỆ
                        </div>
                        <!-- Contact info -->
                        <div class="contactInfo" >
                            <b class="b-address">Địa chỉ</b>
                            <div id="addressMain" style="padding-left: 150px ; ">
                                <?php echo $userP->getAddress(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            NHÓM
                        </div>
                        <!-- Contact info -->
                        <div class="contactInfo" >
                            <div class="item url" data-url="company/g/basehn">
                                <div class="name">Base HN</div>
                                <div class="info">
                                    227 Thành viên · Tham gia ngày 15-02-2022
                                </div>

                                <div class="icon">
                                    <span class="-ap icon-keyboard_arrow_right"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            NHÂN VIÊN TRỰC TIẾP
                        </div>
                    </div>

                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            HỌC VẤN
                        </div>
                        <!-- Contact info -->
                        <div class="contactInfo" >
                            <div class="item url" data-url="company/g/basehn" style="color: black;">
                                <div class="name">Kỹ thuật phần mềm</div>
                                <div class="info" >
                                    Trường Đại Học FPT - 2019-2023
                                </div>

                                <div class="icon">
                                    <span class="-ap icon-keyboard_arrow_right"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            KINH NGIỆM LÀM VIỆC
                        </div>
                        <!-- Contact info -->
                        <div class="contactInfo" >
                            <div class="item url" data-url="company/g/basehn" style="color: black; ">
                                <div class="name">Kỹ thuật phần mềm</div>
                                <div class="info" >
                                    Trường Đại Học FPT - 2019-2023
                                </div>

                                <div class="icon">
                                    <span class="-ap icon-keyboard_arrow_right"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="subInformationBoxCenterTitle" >
                        <div class="mainTitle" >
                            GIẢI THƯỞNG & THÀNH TÍCH
                        </div>
                        <!-- Contact info -->
                        <div class="contactInfo">
                            <div class="item url" data-url="company/g/basehn" style="color: black;">
                                <div class="name">Participation at Vietnam National Olympiad in Informatics - 4th Prize (February 2018)</div>

                                <div class="icon">
                                    <span class="-ap icon-keyboard_arrow_right"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container" style="width: 30%;">

                </div>
            </div>


        </div>

        <!-- sticky label in the right -->
        <div id="stickyLabelRight" class="container">
            <div class="list items">
                <div class="top" >
                    <div class="topContent">
                        <div id="nameTitle" ><?php echo $userP->getDisplayName() ?></div>
                        <div id="emailTitle" >@<?php echo $userP->getEmail() ?></div>
                    </div>

                    <!--list function -->
                    <div class="title">
                        Thông tin tài khoản
                    </div>
                    <div>
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Tài khoản</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Chỉnh sửa </div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Ngôn ngữ</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Đổi mật khẩu</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Đổi màu hiển thị</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Lịch làm việc</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px; padding-bottom: 23px;">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Bảo mật 2 lớp</div>
                        </div>
                    </div>
                    <div class="title" style="border-top: 1px solid #eee; margin-bottom: 20px;">
                        Ứng dụng - bảo mật
                    </div>
                    <div class="title" style="border-top: 1px solid #eee;">
                        Tủy chỉnh nâng cao
                    </div>
                    <div  style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Lịch sử đăng nhập</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Quản lí thiết bị</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Tùy chỉnh email thông báo</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Chỉnh sửa múi giờ</div>
                        </div>
                    </div>
                    <div style="padding-top: 7px">
                        <div class="li active url" style="display: flex;">
                            <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                            <div class="text" style=" margin-left: 15px;">Ủy quyền tạm thời</div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <!-- Modal with AJAX -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 120%; height:auto">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td style="width: 30%;">Họ của bạn</td>

                                        <td>
                                            <input class="form-control firstName" type="text" name="firstName" value="<?php echo $userP->getFirstName() ?>" style="font-size: 16px; margin-bottom: 10px;" required>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td>Tên của bạn</td>

                                        <td>
                                            <input class="form-control lastName" type="text" name="lastName" value="<?php echo $userP->getLastName() ?>" style="font-size: 16px; margin-bottom: 10px;" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>

                                        <td>
                                            <input class="form-control email" type="email" name="email" value="<?php echo $userP->getEmail() ?>" style="font-size: 16px; margin-bottom: 10px; background-color: #eee;" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ảnh hồ sơ</td>

                                        <td>
                                            <div class="mb-3">
                                                <input accept=".jpg, .png" class="form-control image" type="file" id="imageChange" name="image">
                                                <span id="image-warning" style="color:red"></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Số điện thoại của bạn</td>

                                        <td>
                                            <input class="form-control phone" type="number" name="phone" value="<?php echo $userP->getPhone() ?>" style="font-size: 16px; margin-bottom: 10px;" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Địa chỉ hiện tại</td>

                                        <td>
                                            <input class="form-control address" type="text" name="address" value="<?php echo $userP->getAddress() ?>" style="font-size: 16px; margin-bottom: 10px;" required>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Bỏ qua</button>
                            <button type="button"  class="btn btn-success buttonAjax">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="../javascript/profile.js"></script>