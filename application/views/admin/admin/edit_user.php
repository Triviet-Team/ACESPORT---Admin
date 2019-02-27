<div class="bg-white addHeight">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form method="POST" action="" id="frmSubmit" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng Thái</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="status">
                            <option value="1" <?= $info_users->status == 1 ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="2" <?= $info_users->status == 2 ? 'selected' : '' ?>>Ẩn</option>
                            <option value="3" <?= $info_users->status == 3 ? 'selected' : '' ?>>Xóa</option>
                        </select>
                    </div>
                </div>
                
               <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Giới tính</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="sex">
                        	<option value="2" <?= ($info_users->sex == 2) ? 'selected' : '' ?>>Chưa xác định</option>
                            <option value="1" <?= ($info_users->sex == 1) ? 'selected' : '' ?>>Nam</option>
                            <option value="0" <?= ($info_users->sex == 0) ? 'selected' : '' ?>>Nữ</option>                            
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Họ tên"  value="<?php echo $info_users->name ?>">
                        <div class="error"><?= form_error('name') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="error"><?= form_error('password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nhập lại password</label>
                    <div class="col-sm-10">
                        <input type="password" name="re_password" class="form-control" placeholder="Nhập lại password">
                        <div class="error"><?= form_error('re_password') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chức vụ</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="tid">
                            <option value="1" <?= (isset($info_users->tid) && $info_users->tid == 1) ? 'selected' : '' ?>>Thành viên</option>
                            <option value="2" <?= (isset($info_users->tid) && $info_users->tid == 2) ? 'selected' : '' ?>>Manager</option>
                            <option value="3" <?= (isset($info_users->tid) && $info_users->tid == 3) ? 'selected' : '' ?>>Admin</option>
                            <option value="4" <?= (isset($info_users->tid) && $info_users->tid == 4) ? 'selected' : '' ?>>Founder</option>
                        </select>
                    </div>
                </div>
                
               <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Điểm</label>
                    <div class="col-sm-10">
                        <input type="number" name="point_doi" class="form-control" placeholder="Nhập điểm của thành viên"  value="<?= $info_users->point_doi ? $info_users->point_doi : ''?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" placeholder="Email"  value="<?= $info_users->email ? $info_users->email : ''?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="<?php echo $info_users->phone; ?>">
                        <div class="error"><?= form_error('phone') ?></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ngày tháng năm sinh</label>
                    <div class="col-sm-10">
                        <input type="date" name="birthday" class="form-control"  value="<?= $info_users->birthday ? date('Y-m-d', $info_users->birthday) : ''?>">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Đơn vị/Tổ chức</label>
                    <div class="col-sm-10">
                        <input type="text" name="organization" class="form-control" placeholder="Đơn vị/Tổ chức" value="<?= isset($info_users->organization) ? $info_users->organization : ''?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?= isset($info_users->address) ? $info_users->address : ''?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hình Ảnh</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" name="image_link" class="custom-file-input" id="customFile">
                            <label class="custom-file-label">Chọn File</label>
                        </div>

                        <div class="showFile">
                            <?php if (!isset($info_users->image_link)) { ?>
                                <img id="profile-img-tag" src="<?= base_url() ?>public/admin/img/no-img.png" alt="No-Img">
                            <?php } else { ?>
                                <img id="profile-img-tag" src="<?= base_url('uploads/images/user/200_200/' . $info_users->image_link) ?>" alt="No-Img">
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="form-bottom">
            <div class="horControlB">
                <ul>
                    <li>
                        <a class="eSave">
                            <span>Save</span>
                        </a>
                    </li>

                    <li>
                        <a class="eCancel" href="javascript:(0)" onclick="location.href = '<?= base_url('admincp/admin') ?>'">
                            <span>Cancel</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>