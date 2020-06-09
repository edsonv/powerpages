<?php defined('ALTUMCODE') || die() ?>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<!-- <div class="container"> -->
    <!-- <nav aria-label="breadcrumb">
        <small>
            <ol class="custom-breadcrumbs">
                <li><a href="<?= url() ?>"><?= $this->language->index->breadcrumb ?></a> <i class="fa fa-angle-right"></i></li>
                <li><a href="<?= url('pages') ?>"><?= $this->language->pages->index->breadcrumb ?></a> <i class="fa fa-angle-right"></i></li>
                <?php if($data->page->pages_category_url): ?>
                <li><a href="<?= url('pages/' . $data->page->pages_category_url) ?>"><?= $data->page->pages_category_title ?></a> <i class="fa fa-angle-right"></i></li>
                <?php endif ?>
                <li class="active" aria-current="page"><?= $this->language->page->breadcrumb ?></li>
            </ol>
        </small>
    </nav> -->

    <!-- <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
        <h1><?= $data->page->title ?></h1>

        <div class="d-print-none col-auto p-0 d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-outline-secondary mr-3" onclick="window.print()"><i class="fa fa-sm fa-print"></i> <?= $this->language->page->print ?></button>

            <?php if(\Altum\Middlewares\Authentication::is_admin()): ?>
                <?= get_admin_options_button('page', $data->page->page_id) ?>
            <?php endif ?>
        </div>
    </div> -->
    <!-- <p class="text-muted mb-4">
        <span class="mr-3"><?= $data->page->description ?></span>

        <?php $estimated_reading_time = string_estimate_reading_time($data->page->content) ?>
        <?php if($estimated_reading_time->minutes > 0 || $estimated_reading_time->seconds > 0): ?>
        <small>
            <i class="fa fa-sm fa-hourglass-start"></i>
            <?= $estimated_reading_time->minutes ? sprintf($this->language->page->estimated_reading_time, $estimated_reading_time->minutes . ' ' . $this->language->global->date->minutes) : null ?>
            <?= $estimated_reading_time->minutes == 0 && $estimated_reading_time->seconds ? sprintf($this->language->page->estimated_reading_time, $estimated_reading_time->seconds . ' ' . $this->language->global->date->seconds) : null ?>
        </small>
        <?php endif ?>
    </p> -->

    <!-- <?= $data->page->content ?> -->

    <!-- <div class="mt-4">
        <small class="text-muted"><i class="fa fa-calendar"></i> <?= sprintf($this->language->page->last_date, \Altum\Date::get($data->page->last_date, 2)) ?></small>
    </div> -->
<!-- </div> -->

<header id="pricing" class="header py-9">
      <div class="d-flex align-items-center text-light">
        <div class="container position-relative zi-1">
          <div class="row align-items-center">
            <div class="col-12 position-relative text-center zi-4">
              <h2 class="fw-200"><?= $data->page->description ?></h2>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?= $data->page->content ?>
