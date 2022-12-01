            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Form Add User</h4>
                                    <form action="<?= base_url(); ?>Form_User" method="POST" enctype="multipart/form-data">
                                        <p class="card-description">
                                            <?php if ($this->session->flashdata('flash')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            User <?= $this->session->flashdata('flash'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif ?>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">ID User</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="idUser" id="id_user" value="<?= $idUser; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="ex: user@gmail.com" autocomplete="off" />
                                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama" id="nama_user" placeholder="ex: Amelia Nathasa" autocomplete="off" autofocus />
                                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="password" id="password" class="form-control" value="12345" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jk" id="jk_user" value="L">
                                                            Laki-Laki
                                                        </label>
                                                    </div>
                                                    <small class="form-text text-danger"><?= form_error('jk'); ?></small>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jk" id="jk_user" value="P">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                    <select name="role" id="role" class="form-control">
                                                        <option>Kasir</option>
                                                        <option>Groomer</option>
                                                        <option>Member</option>
                                                    </select>
                                                    <small class="form-text text-danger"><?= form_error('role'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="no" id="no_telp" placeholder="ex: 000000000000" autocomplete="off" />
                                                    <small class="form-text text-danger"><?= form_error('no'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Photo</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="foto" class="form-control" id="inputGroupFile01">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamat" name="alamat" autocomplete="off" placeholder="ex: Bandung, Jawa Barat" rows="4"></textarea>
                                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->