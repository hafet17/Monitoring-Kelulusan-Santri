<div class="container">
    <div class="row m-auto justify-content-center">
        <div class="col-md-7">

            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="d-block p-2 bg-primary text-white text-center font-weight-bold"><i class="fas fa-edit"></i> Form Edit Data Nilai</h4>
                </div>
                <div class="card-body font-weight-bold">
                    <?= form_open('admin/edit_nilai/' . $santri['id']); ?>

                    <div class="row">
                        <div class="col-md-6">

                    <div class="form-group">
                                <label for="tr1">Triwulan 1</label>
                                <input style="resize:horizontal; width:150px" id="tr1" class="form-control form-control-sm" aria-required="false" aria-invalid="false" value="Triwulan 1" disabled>
                            </div>

                    <div class="form-group">
                                <label for="akidah1">Input Nilai Akidah : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akidah1" id="akidah1" class="form-control span5" placeholder="Input Akidah" value="<?= $nilai['nilai_aqidah1']; ?>">
                                <small class="text-danger"><?= form_error('akidah1'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="akhlak1">Input Nilai Akhlak : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akhlak1" id="akhlak1" class="form-control span5" placeholder="Input Akhlak" value="<?= $nilai['nilai_akhlak1']; ?>">
                                <small class="text-danger"><?= form_error('akhlak1'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="fiqih1">Input Nilai Fiqih : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="fiqih1" id="fiqih1" class="form-control span5" placeholder="Input Fiqih" value="<?= $nilai['nilai_fiqih1']; ?>">
                                <small class="text-danger"><?= form_error('fiqih1'); ?></small>
                     </div>

                    <div class="form-group pb-2">
                                <label for="alqur'an1">Input Nilai Al Qur'an : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="quran1" id="alqur'an1" class="form-control span5" placeholder="Input Al Qur'an" value="<?= $nilai['nilai_quran1']; ?>">
                                <small class="text-danger"><?= form_error('quran1'); ?></small>
                     </div>
                        </div>

                    <div class="col-md-6">
                     <div class="form-group pt-2">
                                <label for="tr2">Triwulan 2</label>
                                <input style="resize:horizontal; width:150px" id="tr2" class="form-control form-control-sm" aria-required="false" aria-invalid="false" value="Triwulan 2" disabled>
                            </div>

                    <div class="form-group">
                                <label for="akidah2">Input Nilai Akidah : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akidah2" id="akidah2" class="form-control span5" placeholder="Input Akidah" value="<?= $nilai['nilai_aqidah2']; ?>">
                                <small class="text-danger"><?= form_error('akidah2'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="akhlak2">Input Nilai Akhlak : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akhlak2" id="akhlak2" class="form-control span5" placeholder="Input Akhlak" value="<?= $nilai['nilai_akhlak2']; ?>">
                                <small class="text-danger"><?= form_error('akhlak2'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="fiqih2">Input Nilai Fiqih : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="fiqih2" id="fiqih2" class="form-control span5" placeholder="Input Fiqih" value="<?= $nilai['nilai_fiqih2']; ?>">
                                <small class="text-danger"><?= form_error('fiqih2'); ?></small>
                     </div>

                    <div class="form-group pb-2">
                                <label for="alqur'an2">Input Nilai Al Qur'an : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="quran2" id="alqur'an2" class="form-control span5" placeholder="Input Al Qur'an" value="<?= $nilai['nilai_quran2']; ?>">
                                <small class="text-danger"><?= form_error('quran2'); ?></small>
                     </div>
                     </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group pt-2">
                                <label for="tr3">Triwulan 3</label>
                                <input style="resize:horizontal; width:150px" id="tr3" class="form-control form-control-sm" aria-required="false" aria-invalid="false" value="Triwulan 3" disabled>
                            </div>

                    <div class="form-group">
                                <label for="akidah3">Input Nilai Akidah : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akidah3" id="akidah3" class="form-control span5" placeholder="Input Akidah" value="<?= $nilai['nilai_aqidah3']; ?>">
                                <small class="text-danger"><?= form_error('akidah3'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="akhlak3">Input Nilai Akhlak : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akhlak3" id="akhlak3" class="form-control span5" placeholder="Input Akhlak" value="<?= $nilai['nilai_akhlak3']; ?>">
                                <small class="text-danger"><?= form_error('akhlak3'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="fiqih3">Input Nilai Fiqih : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="fiqih3" id="fiqih3" class="form-control span5" placeholder="Input Fiqih" value="<?= $nilai['nilai_fiqih3']; ?>">
                                <small class="text-danger"><?= form_error('fiqih3'); ?></small>
                     </div>

                    <div class="form-group pb-2">
                                <label for="alqur'an3">Input Nilai Al Qur'an : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="quran3" id="alqur'an3" class="form-control span5" placeholder="Input Al Qur'an" value="<?= $nilai['nilai_quran3']; ?>">
                                <small class="text-danger"><?= form_error('quran3'); ?></small>
                     </div>
                        </div>

                    <div class="col-md-6">
                    <div class="form-group pt-2">
                                <label for="tr4">Triwulan 4</label>
                                <input style="resize:horizontal; width:150px" id="tr4" class="form-control form-control-sm" aria-required="false" aria-invalid="false" value="Triwulan 4" disabled>
                            </div>

                    <div class="form-group">
                                <label for="akidah4">Input Nilai Akidah : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akidah4" id="akidah4" class="form-control span5" placeholder="Input Akidah" value="<?= $nilai['nilai_aqidah4']; ?>">
                                <small class="text-danger"><?= form_error('akidah4'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="akhlak4">Input Nilai Akhlak : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="akhlak4" id="akhlak4" class="form-control span5" placeholder="Input Akhlak" value="<?= $nilai['nilai_akhlak4']; ?>">
                                <small class="text-danger"><?= form_error('akhlak4'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="fiqih4">Input Nilai Fiqih : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="fiqih4" id="fiqih4" class="form-control span5" placeholder="Input Fiqih" value="<?= $nilai['nilai_fiqih4']; ?>">
                                <small class="text-danger"><?= form_error('fiqih4'); ?></small>
                     </div>

                    <div class="form-group">
                                <label for="alqur'an4">Input Nilai Al Qur'an : </label>
                                <input style="resize:horizontal; width:150px" type="number" name="quran4" id="alqur'an4" class="form-control span5" placeholder="Input Al Qur'an" value="<?= $nilai['nilai_quran4']; ?>">
                                <small class="text-danger"><?= form_error('quran4'); ?></small>
                     </div>
                     </div>

                    </div>
                        <button type="submit" name="simpan" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                        <button type="reset" value="Reset"  class="btn btn-success float-right mr-3"><i class="fas fa-trash-restore"></i>  Reset</button>
                      </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>