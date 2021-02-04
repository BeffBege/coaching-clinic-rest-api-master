<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- partial -->
<div class="page-content-wrapper">
  <div class="page-content-wrapper-inner">
    <div class="content-viewport">
      <div class="row">
        <div class="col-12 py-5">
          <h4>Dashboard Admin</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
        <span class="text-white badge badge-info">Anda Login Sebagai Admin : <?= session('name'); ?></span>
        </div>
        </div>
        <!-- <div class="col-md-4 equel-grid">
                <div class="grid">
                  <div class="grid-body">
                    <div class="split-header">
                      <p class="card-title">Activity Log</p>
                      <div class="btn-group">
                        <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#">Expand View</a>
                          <a class="dropdown-item" href="#">Edit</a>
                        </div>
                      </div>
                    </div>
                    <div class="vertical-timeline-wrapper">
                      <div class="timeline-vertical dashboard-timeline">
                        <div class="activity-log">
                          <p class="log-name">Agnes Holt</p>
                          <div class="log-details">Analytics dashboard has been created<span class="text-primary ml-1">#Slack</span></div>
                          <small class="log-time">8 mins Ago</small>
                        </div>
                        <div class="activity-log">
                          <p class="log-name">Ronald Edwards</p>
                          <div class="log-details">Report has been updated <div class="grouped-images mt-2">
                              <img class="img-sm" src="../assets/images/profile/male/image_4.png" alt="Profile Image" data-toggle="tooltip" title="Gerald Pierce">
                              <img class="img-sm" src="../assets/images/profile/male/image_5.png" alt="Profile Image" data-toggle="tooltip" title="Edward Wilson">
                              <img class="img-sm" src="../assets/images/profile/female/image_6.png" alt="Profile Image" data-toggle="tooltip" title="Billy Williams">
                              <img class="img-sm" src="../assets/images/profile/male/image_6.png" alt="Profile Image" data-toggle="tooltip" title="Lelia Hampton">
                              <span class="plus-text img-sm">+3</span>
                            </div>
                          </div>
                          <small class="log-time">3 Hours Ago</small>
                        </div>
                        <div class="activity-log">
                          <p class="log-name">Charlie Newton</p>
                          <div class="log-details"> Approved your request <div class="wrapper mt-2">
                              <button type="button" class="btn btn-xs btn-primary">Approve</button>
                              <button type="button" class="btn btn-xs btn-inverse-primary">Reject</button>
                            </div>
                          </div>
                          <small class="log-time">2 Hours Ago</small>
                        </div>
                        <div class="activity-log">
                          <p class="log-name">Gussie Page</p>
                          <div class="log-details">Added new task: Slack home page</div>
                          <small class="log-time">4 Hours Ago</small>
                        </div>
                        <div class="activity-log">
                          <p class="log-name">Ina Mendoza</p>
                          <div class="log-details">Added new images</div>
                          <small class="log-time">8 Hours Ago</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="border-top px-3 py-2 d-block text-gray" href="#">
                    <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i> View All </small>
                  </a>
                </div>
              </div> -->
      </div>
    </div>
  </div>
  <!-- content viewport ends -->

  <?= $this->endSection(); ?>
</div>
