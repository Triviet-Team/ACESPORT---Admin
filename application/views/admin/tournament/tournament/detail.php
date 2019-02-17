<div class="bg-white addHeight height-auto">
    <div class="ui-wid">
        <div class="form-head">
            <?= $title ?>
        </div>
        <div class="form-mid">
            <form action="" method="POST" id="frmSubmit" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng Thái</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="status">
                            <option value="1" <?= @$info->status == 1 ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="2" <?= @$info->status == 2 ? 'selected' : '' ?>>Ẩn</option>
                            <option value="3" <?= @$info->status == 3 ? 'selected' : '' ?>>Xóa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Danh mục</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="select" name="cid">
                            <?php foreach ($catalogs as $row) { ?>
                                <?php if ($row->subs) { ?>
                                    <optgroup label="<?php echo $row->vn_name ?>">
                                        <?php foreach ($row->subs as $sub) { ?>
                                            <option value="<?php echo $sub->id ?>" <?= @$info->pid == $sub->id ? 'selected' : '' ?>><?php echo $sub->vn_name ?> </option>
                                        <?php } ?>
                                    </optgroup>
                                <?php } else { ?>
                                    <option value="<?php echo $row->id ?>"  <?= @$info->pid == $row->id ? 'selected' : '' ?>><?php echo $row->vn_name ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>  
                </div>
                
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nội dung thi đấu</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <?php if ($noi_dung){ ?>
                                <?php foreach ($noi_dung as $row) { ?>
                                   <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <!-- <input type="checkbox" class="custom-control-input" <?= @$info->is_new == 1 ? 'checked' : '' ?> value="1" name="noi_dung[]" id="is_new<?= $row->id ?>">
                                            <label class="custom-control-label" for="is_new<?= $row->id ?>"><?= $row->vn_name ?></label>
                                            <input min="1"  name="total_member[]" class="content-page-all-member" type="number" placeholder="Tổng thành viên" />
                                            
                                            <input type="checkbox" class="custom-control-input" <?= @$info->is_new == 1 ? 'checked' : '' ?> value="1" name="noi_dung[]" id="is_new<?= $row->id ?><?= $row->id ?>">
                                            <label class="custom-control-label" for="is_new<?= $row->id ?><?= $row->id ?>">Đôi</label>-->
                                            <?php 
                                                if(@$arrPid){ 
                                                    $checkedNoiDung = '';
                                                    $checkedLoaiChoi = '';
                                                    $total_member    = '';
                                                    $set    = '';
                                                    foreach ($arrPid as $k => $row_1) {
                                                        if ($row->id == $row_1->playing_category_id){
                                                            $checkedNoiDung = 'checked';
                                                            $checkedLoaiChoi = $row_1->type_play == 2 ? 'checked' : '';
                                                            $total_member    = $row_1->total_member;
                                                            $set             = $row_1->set;
                                                        }
                                                    }
                                                } 
                                            ?>
                                        	 <label class="checkbox-container"><?= $row->vn_name ?>
                                              <input type="checkbox" <?= $checkedNoiDung ?> value="<?= $row->id ?>" " name="noi_dung[]" />
                                              <span class="checkmark"></span>
                                            </label>
                                             <label class="checkbox-container">Đôi
                                              <input type="checkbox" value="1" <?= $checkedLoaiChoi ?> name="loai_choi[<?= $row->id ?>]" />
                                              <span class="checkmark"></span>
                                            </label>
                                            <input min="1"  name="total_member[<?= $row->id ?>]" class="content-page-all-member" type="number" value="<?= $total_member ?>" placeholder="Tổng thành viên" />
                                            <input min="1"  name="set[<?= $row->id ?>]" class="content-page-all-member" type="number" value="<?= $set ?>" placeholder="Số set đấu" />
                                            
                                        </div>
                                    </div>
                                 <?php }?>
                            <?php } ?>
                            
                            

                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ngày bắt đầu giải đấu</label>
                    <div class="col-sm-10">
                        <input type="date" name="start_date" value="<?= @$info->start_date ? date('Y-m-d', @$info->start_date) : ''?>" class="form-control">
                        <div class="error"><?= form_error('start_date') ?></div>
                    </div>
                </div>
                
               <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ngày kết thúc giải đấu</label>
                    <div class="col-sm-10">
                        <input type="date" name="end_date" value="<?= @$info->end_date ? date('Y-m-d', @$info->end_date) : ''?>" class="form-control">
                        <div class="error"><?= form_error('end_date') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên giải đấu</label>
                    <div class="col-sm-10">
                        <input type="text" name="vn_name" value="<?= isset($info->vn_name) ? $info->vn_name : set_value('vn_name') ?>" id="vn_name" onkeyup="return slug('vn_name', 'vn_slug');" class="form-control">
                        <div class="error"><?= form_error('vn_name') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" name="vn_slug" value="<?= isset($info->vn_slug) ? $info->vn_slug : set_value('vn_slug') ?>" id="vn_slug" onkeyup="return slug('vn_name', 'vn_slug');" class="form-control">
                    </div>
                </div>
				<!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Giá sản phẩm</label>
                    <div class="col-sm-10">
                        <input class="form-control format_number" value="<?= isset($info->price) ? $info->price : set_value('price') ?>" name="price"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Giá SP sau khi giảm</label>
                    <div class="col-sm-10">
                        <input class="form-control format_number" value="<?= isset($info->sale_price) ? $info->sale_price : set_value('sale_price') ?>" placeholder="Nhập giá sản phẩm sau khi đã giảm giá" name="sale_price"/>
                    </div>
                </div>
               	<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mã sản phẩm</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?= isset($info->code) ? $info->code : set_value('code') ?>" name="code"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cấu Hình</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" <?= @$info->is_new == 1 ? 'checked' : '' ?> value="1" name="is_new" id="is_new">
                                    <label class="custom-control-label" for="is_new">Hiện trang chủ</label>
                                </div>
                            </div>
                            
                           <div class="col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" <?= @$info->is_pay == 1 ? 'checked' : '' ?> value="1" name="is_pay" id="is_pay">
                                    <label class="custom-control-label" for="is_pay">Sản phẩm bán chạy</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" <?= @$info->is_hight == 1 ? 'checked' : '' ?> value="1" name="is_hight" id="is_hight">
                                    <label class="custom-control-label" for="is_hight">Sản phẩm nổi bật</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keyword</label>
                    <div class="col-sm-10">
                        <input type="text" name="vn_keyword" value="<?= isset($info->vn_keyword) ? $info->vn_keyword : set_value('vn_keyword') ?>"  data-role="tagsinput" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="vn_title" value="<?= isset($info->vn_title) ? $info->vn_title : set_value('vn_title') ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" name="vn_description"><?= isset($info->vn_description) ? $info->vn_description : set_value('vn_description') ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" id="sapo" name="vn_sapo"><?= isset($info->vn_sapo) ? $info->vn_sapo : set_value('vn_sapo') ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Chi tiết giải đấu</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="10" id="editor" name="vn_detail"><?= isset($info->vn_detail) ? $info->vn_detail : set_value('vn_detail') ?></textarea>
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
                            <?php if (!isset($info->image_link)) { ?>
                                <img id="profile-img-tag" src="<?= base_url() ?>public/admin/img/no-img.png" alt="No-Img">
                            <?php } else { ?>
                                <img id="profile-img-tag" src="<?= base_url('uploads/images/product/421_561/' . $info->image_link) ?>" alt="No-Img">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hình ảnh kèm theo</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" name="image_list[]" multiple class="custom-file-input" id="files">
                            <label class="custom-file-label">Chọn File</label>
                        </div>
                        <div class="showFile" id="showMulti">
                            <?php if (!isset($info->image_list)) { ?>
                                <img id="profile-img-tag" src="<?= base_url() ?>public/admin/img/no-img.png" alt="No-Img">
                            <?php } else { ?>
                                <div  id="showMulti">
                                    <?php $image_list = json_decode($info->image_list) ?>
                                    <?php foreach ($image_list as $img) { ?>
                                        <img src="<?= base_url('uploads/images/product/400_400/' . $img) ?>" alt="No-Img">
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <p style="margin-top:10px;">Giữ Ctrl và chọn nhiều File Ảnh để đính kèm 2 hoặc nhiều ảnh !</p>
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
                        <a class="eCancel" href="javascript:(0)" onclick="location.href = '<?= base_url('admincp/tournament/tournament') ?>'">
                            <span>Cancel</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>