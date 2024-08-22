<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Gawe &mdash; yukGawe</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="section">
    <div class="section-header">
      <h1>Gawe</h1>
      <div class="section-header-button">
        <a href="<?=site_url('gawe/add')?>" class="btn btn-primary">Add New</a>
      </div>
    </div>

    <?= $this->include('layout/alert') ?>

    <div class="section-body">

      <div class="card">
        <div class="card-header">
          <h4>Data Gawe / Acara</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped table-md" id="table1">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Gawe</th>
                <th>Tanggal Gawe</th>
                <th>Info</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gawe as $key => $value) : ?>
                <tr>
                  <td><?=$key + 1?></td>
                  <td><?=$value->name_gawe?></td>
                  <td><?=date('d/m/Y', strtotime($value->date_gawe))?></td>
                  <td><?=$value->info_gawe?></td>
                  <td class="text-center" style="width:15%">
                    <a href="<?=site_url('gawe/edit/'.$value->id_gawe)?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <form action="<?=site_url('gawe/'.$value->id_gawe)?>" method="post" class="d-inline" id="del-<?=$value->id_gawe?>">
                      <?= csrf_field() ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda yakin?" data-confirm-yes="submitDel(<?=$value->id_gawe?>)">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
<?= $this->endSection() ?>