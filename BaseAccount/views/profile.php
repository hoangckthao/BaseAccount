<?php

use app\core\Application;

?>
<div class="container-fluid" style="padding: 0; display: flex; flex-direction:row">

    <!-- sticky label in the left -->
    <div class="container" style="width: 128px; background-color: #211c23;  top: 0px; left: 0px; height: 100vh; transition-property:all; position: sticky; float:left">
        <div class="item" style="position: relative;">
            <div style="height: 51px;text-align: center; cursor:pointer">
                <div class="innerImage" style="width: 32px; height: 32px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <img style="border: none; overflow: hidden; font-size: 10px; color: transparent;width: 32px; height: 32px; border-radius: 16px; display: block;" src="https://data-gcdn.basecdn.net/avatar/sys1/12/ea/ab/e6/4a/f19980ce34ec980dbbe02777f8e7f565/0.cuongtran_1.jpg?ts=1681358745">
                </div>
            </div>
        </div>
        <div class="item" style="position: relative; padding:5px">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i style="color: #fff; font-size:24px" class='far fa-address-card'></i>
                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #fff; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                Cá nhân
            </div>
        </div>

        <div class="item" style="position: relative; padding:5px">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i class='far fa-bell' style='font-size:24px; color:#888'></i>
                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                Thông báo
            </div>
        </div>

        <div class="item" style="position: relative; padding:5px; ">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i class='fas fa-user-friends' style='font-size:24px;color:#888 '></i>
                </div>
            </div>
            <div class="info" style="font-weight: bolnormald; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                Thành viên
            </div>
        </div>

        <div class="item" style="position: relative; padding:5px">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i class='fas fa-balance-scale' style='font-size:24px; color: #888;'></i>
                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                Nhóm
            </div>
        </div>

        <div class="item" style="position: relative; padding:5px">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i class='far fa-flag' style='font-size:24px; color:#888'></i>
                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                TK Khách
            </div>
        </div>
        <div class="item" style="position: relative; padding:5px">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">
                    <i class='fas fa-globe' style='font-size:24px; color: #888;'></i>
                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                Ứng dụng
            </div>
        </div>

        <div class="item" style="position: relative; bottom: 20px; left: 0px; ">
            <div style="height: 41px;text-align: center; cursor:pointer">
                <div class="icon" style="width: 36px; height: 36px; margin: auto; overflow: hidden; margin-top: 10px;">

                </div>
            </div>
            <div class="info" style="font-weight: normal; display: block; color: #888; text-transform: none;
                font-size: 13px; position: relative; top: auto; left: auto; background-color: transparent; 
                padding-top: 0px; padding-bottom: 15px; margin-top: -2px; text-align: center;">
                <a class="nav-link" aria-current="page" href="/logout" id="logoutName" style="margin-top: 35px;">
                    Đăng xuất
                </a>
            </div>
        </div>

    </div>


    <div class="container">
        <!-- navbar navigation -->
        <nav class="navbar navbar-expand-lg" style="background-color: white; border-bottom: 2px solid #eee;" id="navbarTutorial">
            <div class="container-fluid">
                <a class="navbar-brand" href="/login"><-- </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="display: block;">

                                <?php
                                if (!Application::isGuest()) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" style="text-transform: uppercase;color: #ccc; font-size: 11px; font-weight: normal; padding-bottom: 3px; margin-bottom: -11px;">Tài khoản</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" id="navbarName" style="font-size: 18px; font-weight: 300; color: #222;">
                                            <?php echo Application::$app->user->getDisplayName() ?>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                            <?php
                            if (Application::isGuest()) {

                            ?>
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-top: 10px; padding-right: 10px; ; position: absolute; top: 0; right: 0;">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/register">Register</a>
                                    </li>
                                </ul>
                            <?php } else {

                            ?>
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-top: 25px; padding-right: 10px; ; position: absolute; top: 0; right: 0;">
                                    <li class="nav-item" style="margin-top: -5px;">
                                        <button style="border-radius: 4px; padding: 6px 15px; border: hidden;  background-color: #16bccf;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" id="open-popup-btn">
                                            <i class='fas fa-arrow-up' style='font-size:12px;padding-right: 12px;padding-bottom: 6px;'></i>
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

                    <!-- <img style="object-fit: cover; width: 100%; height: auto;" src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="Loading Picture"> -->
                    <img id="uploadImageFinished" width="100px" height="100px" style="border:#000; z-index:1;position: relative; border-width:2px; float:left" height="100px" src="\fakepath\img_413163228-compress0.pdf">
                    <form id="imageUploadForm" enctype="multipart/form-data">
                        <input type="file" accept=".jpg, .png" id="image" name="image" style="font-size: 10px;" />
                    </form>
                </div>
                <!-- content -->
                <div class="container" style="display: flex; flex-direction:column">
                    <div style="font-size: 28px;" id="fullNameMain">
                        <?php echo $userP->getDisplayName() ?>
                    </div>
                    <div style="font-size: 16px;font-weight: 200;">Owner</div>
                    <div style="display: flex; flex-direction:row">
                        <div style="padding-right: 10px; width:20%; color: #666; font-weight: 500; left: 0px;">Địa chỉ email</div>
                        <div id="emailMain">
                            <?php echo $userP->getEmail(); ?>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction:row">
                        <div style="padding-right: 10px; width:20%; color: #666; font-weight: 500; left: 0px;">Số điện thoại</div>
                        <div id="phoneMain">
                            <?php echo $userP->getPhone(); ?>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- sub infomation -->
        <div class="container" style="display: flex; margin-top:30px;  ">
            <div class="container" style="width: 30%;">

            </div>
            <div class="container" style="display: flex; flex-direction: column;max-width: 80%; ">

                <!-- content -->
                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        THÔNG TIN LIÊN HỆ
                    </div>
                    <!-- Contact info -->
                    <div style="display: flex; flex-direction: row; position: relative; font-size: 14px; padding: 13px 0 13px 0;  border-bottom: 1px dotted #ddd;">
                        <b style="font-weight: 500; color: #888; font-size: 13px; top: 13px; left: 0px;">Địa chỉ</b>
                        <div id="addressMain" style="padding-left: 150px ; ">
                            <?php echo $userP->getAddress(); ?>
                        </div>
                    </div>
                </div>

                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        NHÓM
                    </div>
                    <!-- Contact info -->
                    <div style="display: flex; flex-direction: row; position: relative; font-size: 14px; padding: 13px 0 13px 0;  border-bottom: 1px dotted #ddd;">
                        <div class="item url" data-url="company/g/basehn" style="color: #7c32a1; cursor: pointer; font-weight:bold; font-size:17px">
                            <div class="name">Base HN</div>
                            <div class="info" style="font-weight: normal;font-size: 14px; color: #999;">
                                227 Thành viên · Tham gia ngày 15-02-2022
                            </div>

                            <div class="icon">
                                <span class="-ap icon-keyboard_arrow_right"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        NHÂN VIÊN TRỰC TIẾP
                    </div>
                </div>

                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        HỌC VẤN
                    </div>
                    <!-- Contact info -->
                    <div style="display: flex; flex-direction: row; position: relative; font-size: 14px; padding: 13px 0 13px 0;  border-bottom: 1px dotted #ddd;">
                        <div class="item url" data-url="company/g/basehn" style="color: black; cursor: pointer; font-weight:bold; font-size:17px">
                            <div class="name">Kỹ thuật phần mềm</div>
                            <div class="info" style="font-weight: normal;font-size: 14px; color: #999;">
                                Trường Đại Học FPT - 2019-2023
                            </div>

                            <div class="icon">
                                <span class="-ap icon-keyboard_arrow_right"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        KINH NGIỆM LÀM VIỆC
                    </div>
                    <!-- Contact info -->
                    <div style="display: flex; flex-direction: row; position: relative; font-size: 14px; padding: 13px 0 13px 0;  border-bottom: 1px dotted #ddd;">
                        <div class="item url" data-url="company/g/basehn" style="color: black; cursor: pointer; font-weight:bold; font-size:17px">
                            <div class="name">Kỹ thuật phần mềm</div>
                            <div class="info" style="font-weight: normal;font-size: 14px; color: #999;">
                                Trường Đại Học FPT - 2019-2023
                            </div>

                            <div class="icon">
                                <span class="-ap icon-keyboard_arrow_right"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-top: 40px;padding-bottom: 20px;">
                    <div style="width: 100%; font-weight: 500; font-size: 13px; color: #aaa; position: relative; text-transform: uppercase; padding: 15px 0; border-bottom: 1px solid #ddd;">
                        GIẢI THƯỞNG & THÀNH TÍCH
                    </div>
                    <!-- Contact info -->
                    <div style="display: flex; flex-direction: row; position: relative; font-size: 14px; padding: 13px 0 13px 0;  border-bottom: 1px dotted #ddd;">
                        <div class="item url" data-url="company/g/basehn" style="color: black; cursor: pointer; font-weight:bold; font-size:17px">
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
    <div class="container" style="position: relative; width: 288px; bottom: 0px; right: 0px; top: 0px; color: #999; border-left: 1px solid rgba(0,0,0,0.1); background-color: #f6f6f6;">
        <div class="list items" style="padding: 0; margin: 0; display:block;">
            <div class="top" style="padding: 12px 0px;border-bottom: 2px solid #eee; height: 74px; box-sizing: border-box;">
                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; word-wrap: normal;">
                    <div id="nameTitle" style="font-size: 22px; font-weight: 300; color: #111;"><?php echo $userP->getDisplayName() ?></div>
                    <div id="emailTitle" style="font-weight: normal; font-size: 14px; padding-top: 4px;">@<?php echo $userP->getEmail() ?></div>
                </div>

                <!--list function -->
                <div class="title" style="font-weight: 300;font-size: 14px; text-transform: uppercase; color: #999;padding: 20px 15px 15px 20px; margin-left: -9px;">
                    Thông tin tài khoản
                </div>
                <div class="position:relative; display:flex">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Tài khoản</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Chỉnh sửa </div>
                    </div>
                </div>
                <div class="position:relative; display:flex; " style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Ngôn ngữ</div>
                    </div>
                </div>
                <div class="position:relative; display:flex; " style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Đổi mật khẩu</div>
                    </div>
                </div>
                <div class="position:relative; display:flex; " style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Đổi màu hiển thị</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Lịch làm việc</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px; padding-bottom: 23px;">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Bảo mật 2 lớp</div>
                    </div>
                </div>
                <div class="title" style="font-weight: 300;font-size: 14px; text-transform: uppercase; color: #999;padding: 20px 15px 15px 20px; border-top: 1px solid #eee;     margin-left: -9px;margin-bottom: 20px;">
                    Ứng dụng - bảo mật
                </div>
                <div class="title" style="font-weight: 300;font-size: 14px; text-transform: uppercase; color: #999;padding: 20px 15px 15px 20px; border-top: 1px solid #eee;     margin-left: -9px;">
                    Tủy chỉnh nâng cao
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Lịch sử đăng nhập</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Quản lí thiết bị</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Tùy chỉnh email thông báo</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
                    <div class="li active url" style="display: flex;">
                        <div class="icon" style="width: fit-content;"><i class='fas fa-plus-circle' style='font-size:12px'></i></div>
                        <div class="text" style=" margin-left: 15px;">Chỉnh sửa múi giờ</div>
                    </div>
                </div>
                <div class="position:relative; display:flex;" style="padding-top: 7px">
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
                                            <input class="form-control image" type="file" id="image" name="image">
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
                    <div class="modal-footer" style="overflow: hidden; padding-top: 20px; border-top: 1px dashed #ddd; margin-top: 5px">
                        <button type="button" style="float:right; padding: 11px 0px; width: 48%;" class="btn btn-secondary" data-bs-dismiss="modal">Bỏ qua</button>
                        <button type="button" style="float:left; padding: 11px 0px; width: 48%;" class="btn btn-success buttonAjax">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(e) {
            //upload image  

            $("#image").on("change", function(e) {
                // $("#imageUploadForm").submit();
                const {
                    files
                } = event.target;
                var formData = new FormData;
                e.preventDefault(); 
                formData.append('imageFile', files[0]);
                $.ajax({
                    url: 'uploadImage',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data) {
                        console.log("success");
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    finally: function() {

                    }
                });
                // var file = files[0];
                // var ajax = new XMLHttpRequest;
                // var formData = new FormData;
                // formData.append('imageFile', file);

                // ajax.upload.addEventListener("progress", myProgressHandler, false);
                // ajax.addEventListener('load', myOnLoadHandler, false);
                // ajax.open('POST', '/uploadImage', true);
                // ajax.send(formData);
                
            });

            function myProgressHandler(event) {
                //your code to track upload progress
                var p = Math.floor(event.loaded / event.total * 100);
                document.title = p + '%';
            }

            function myOnLoadHandler(event) {
                // your code on finished upload
                alert(event.target.responseText);
            }
            // $('#imageUploadForm').on('submit', function(e) {
            //     e.preventDefault();
            //     var formData = new FormData(this);
            //     console.log(formData);
            //     $ajax({
            //         url: 'uploadImage',
            //         type: 'POST',
            //         data: formData,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         success:function(data) {
            //             console.log("success");
            //             console.log(data);
            //         },
            //         error: function(xhr, status, error) {
            //             console.log(error);
            //         },
            //         finally: function() {

            //         }
            //     });
            // });

            /////////////////////////////////////////////////////////////////////////////////
            // Edit profile
            $('.buttonAjax').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'editProfile',
                    type: 'POST',
                    data: {
                        firstName: $('.firstName').val(),
                        lastName: $('.lastName').val(),
                        email: $('.email').val(),
                        phone: $('.phone').val(),
                        address: $('.address').val(),
                    },

                    dataType: 'json',
                    success: function(data) {
                        $('#staticBackdrop').hide();
                        $('.modal-backdrop').hide();

                        document.getElementById("fullNameMain").innerHTML = data['firstName'] + ' ' + data['lastName'];
                        document.getElementById("nameTitle").innerHTML = data['firstName'] + ' ' + data['lastName'];
                        document.getElementById("navbarName").innerHTML = data['firstName'] + ' ' + data['lastName'];
                        document.getElementById("emailMain").innerHTML = data['email'];
                        document.getElementById("emailTitle").innerHTML = data['email'];
                        document.getElementById("phoneMain").innerHTML = data['phone'];
                        document.getElementById("addressMain").innerHTML = data['address'];


                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    finally: function() {

                    }
                });
            });
        });
    </script>

</div>