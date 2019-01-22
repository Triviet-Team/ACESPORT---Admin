<article>
    <section class="bread-crumb">
      <div class="container-fluid">
		<?php $this->load->view('site/breadcrumb'); ?>
      </div>
    </section>
<link href="<?= base_url() ?>public/site/css/cart.css" rel="stylesheet" type="text/css"/>
<div class="container" style="margin-bottom: 100px;">
    <div class="title">
        <h2>Thông tin sản phẩm</h2>
    </div>
    <?php if ($total_items > 0) { ?>
        <div class="table-responsive-custom">
            <form action="<?php echo base_url('cart/update') ?>" method="post">
                <table class="table table-borderless tableCustom">
                    <thead>
                        <tr>
                            <th scope="col">Hình ảnh sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_amount = 0;?>

                        <?php foreach ($carts as $row) { 
                            

                            
                        ?>
                            <?php $total_amount = $total_amount + $row['subtotal']; ?>
                            <tr>
                                <td>
                                    <div class="imgCart">
                                    	<?php 
                                        	$link_img = base_url().'public/site/img/default-400x400.png';
                                        	if(!empty($row['image_link'])){
                                        	    $link_img = base_url().'uploads/images/product/400_400/'.$row['image_link'];
                                        	}
                                    	?>
                                        <img src="<?= $link_img ?>">
                                    </div>
                                </td>
                                <td><?= $row['name']; ?></td>
                                <td><?= ($row['price'] > 0 ? number_format($row['price']) . ' đ' : 'Liên hệ')?></td>
                                <td><input name="qty_<?= $row['id'] ?>" type="number" min="1" class="quantity" value="<?= $row['qty']; ?>" size="5"/></td>
                                <td><?= ($row['subtotal'] > 0 ? number_format($row['subtotal']) . ' đ' : 'Liên hệ')?></td>
                                <td><a href="<?= base_url('cart/del/' . $row['id']) ?>" class="btn-delete"> Xóa</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <button type="submit" class="updateBtn">Cập nhật giỏ hàng</button>
                                <a href="<?= base_url('cart/del') ?>" class="btn-delAll">
                                    Xóa giỏ hàng
                                </a>
                            </td>
                            <td class="totalPay">
                                Tổng thanh toán:   <b style="position: static;"><?= number_format(@$total_mony) ?>đ</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>

    <?php } else { ?>
        <p class="text-center" style="margin-bottom: 15px;">Không có sản phẩm trong giỏ hàng</p>
    <?php } ?>
    <?php if ($total_items > 0) { ?>
        <div class="infoCustomer">
            <div class="title">
                <h2>Thông tin khách hàng</h2>
            </div>

            <form id="myform" method="POST" action="<?= base_url('order/checkout') ?>">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="user_name" value="<?= set_value('user_name') ?>" class="form-control">
                            <div class="error"><?= form_error('user_name') ?></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" value="<?= set_value('user_email') ?>" class="form-control">
                            <div class="error"><?= form_error('user_email') ?></div>
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="number" name="user_phone" value="<?= set_value('user_phone') ?>" class="form-control">
                            <div class="error"><?= form_error('user_phone') ?></div>
                        </div>
 						<div class="form-group">
                            <label>Tỉnh / TP</label>
                            <select id="province" name="province" class="form-control">
                            	<option value="">Chọn Tỉnh/Thành phố</option>
                            	<?php if(@$provinces){?>
                            		<?php foreach ($provinces as $row){?>
                            			<option value="<?= $row->id ?>"><?= $row->name ?></option>
                            		<?php }?>
                            	<?php }?>
                            </select>
                            <div class="error"><?= form_error('province') ?></div>
                        </div>
                        <div class="form-group">
                            <label>Quận / Huyện</label>
                            <select id="district" name="district" class="form-control">
                            <option value="">Chọn Quận/Huyện</option>
                            	<option></option>
                            </select>
                            <div class="error"><?= form_error('district') ?></div>
                        </div>
                        
                        <div class="form-group">
                            <label>Xã / Phường</label>
                            <select id="ward" name="ward" class="form-control">
                            <option value="">Chọn Xã/Phường</option>
                            	<option></option>
                            </select>
                            <div class="error"><?= form_error('ward') ?></div>
                        </div>
                        
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="user_address" value="<?= set_value('user_address') ?>" class="form-control">
                            <div class="error"><?= form_error('user_address') ?></div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label><i style="margin-right:10px;" class="fa fa-calendar" aria-hidden="true"></i>Ngày giao hàng</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="date" name="receivingdate" value="<?= set_value('receivingdate') ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Lời nhắn đính kèm</label>
                            <textarea rows="5" class="form-control" name="message"><?= set_value('message') ?></textarea>
                        </div>

                    </div>

                </div>
                <div style="margin-bottom:50px;" class="text-center">
                    <!--  <button class="submitForm" type="submit">Đặt hàng</button>-->
                    <input type="submit" style="padding: 10px 20px; color: #ffff; background: #252525; border: none; cursor: pointer;" value="Đặt hàng">
                </div>

            </form>
        </div>
    <?php } ?>
</div>
</article>