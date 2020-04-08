<?php defined('ALTUMCODE') || die(); ?>

<?php ob_start() ?>
<link href="<?= url(ASSETS_URL_PATH . 'css/datepicker.min.css') ?>" rel="stylesheet" media="screen">
<?php \Altum\Event::add_content(ob_get_clean(), 'head') ?>

<?php ob_start() ?>
<script src="<?= url(ASSETS_URL_PATH . 'js/libraries/datepicker.min.js') ?>"></script>
<script src="<?= url(ASSETS_URL_PATH . 'js/libraries/Chart.bundle.min.js') ?>"></script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

<div class="d-flex flex-column flex-lg-row justify-content-between mb-5">
    <div>
        <div class="d-flex justify-content-between">
            <h1 class="h3"><i class="fa fa-xs fa-chart-line text-gray-700"></i> <?= sprintf($this->language->admin_statistics->header) ?></h1>
        </div>
        <p class="text-muted"><?= $this->language->admin_statistics->subheader ?></p>
    </div>

    <div class="col-auto p-0">
        <form class="form-inline" id="datepicker_form">
            <label>
                <div id="datepicker_selector" class="text-muted clickable">
                    <span class="mr-1">
                        <?php if($data->date->start_date == $data->date->end_date): ?>
                            <?= \Altum\Date::get($data->date->start_date, 2) ?>
                        <?php else: ?>
                            <?= \Altum\Date::get($data->date->start_date, 2) . ' - ' . \Altum\Date::get($data->date->end_date, 2) ?>
                        <?php endif ?>
                    </span>
                    <i class="fa fa-caret-down"></i>
                </div>

                <input
                        type="text"
                        id="datepicker_input"
                        data-range="true"
                        name="date_range"
                        value="<?= $data->date->input_date_range ? $data->date->input_date_range : '' ?>"
                        placeholder=""
                        autocomplete="off"
                        class="custom-control-input"
                >
            </label>
        </form>
    </div>
</div>

<?php display_notifications() ?>

<?php ob_start() ?>
<script>
    /* Datepicker */
    $.fn.datepicker.language['altum'] = <?= json_encode(require APP_PATH . 'includes/datepicker_translations.php') ?>;
    let datepicker = $('#datepicker_input').datepicker({
        language: 'altum',
        dateFormat: 'yyyy-mm-dd',
        autoClose: true,
        timepicker: false,
        toggleSelected: false,
        minDate: false,
        maxDate: new Date($('#datepicker_input').data('max')),

        onSelect: (formatted_date, date) => {

            if(date.length > 1) {
                let [ start_date, end_date ] = formatted_date.split(',');

                if(typeof end_date == 'undefined') {
                    end_date = start_date
                }

                /* Redirect */
                redirect(`admin/statistics/${start_date}/${end_date}`);
            }
        }
    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>


<?php if($this->settings->payment->is_enabled): ?>
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <h2 class="h4"><i class="fa fa-dollar-sign fa-xs text-muted"></i> <?= $this->language->admin_statistics->sales->header ?></h2>

            <?php $sales_data = $this->database->query("SELECT SUM(`amount`) AS `earnings`, `currency`, COUNT(`id`) AS `count` FROM `payments` WHERE `date` BETWEEN '{$data->date->start_date_query}' AND DATE_ADD('{$data->date->end_date_query}', INTERVAL 1 DAY) GROUP BY `currency` ") ?>
            <?php if(!$sales_data->num_rows): ?>
                <p class="text-muted"><?= $this->language->admin_statistics->sales->no_sales ?></p>
            <?php else: ?>

                <?php
                $logs_chart = [];
                $result = $this->database->query("SELECT COUNT(*) AS `total_sales`, DATE_FORMAT(`date`, '%Y-%m-%d') AS `formatted_date`, TRUNCATE(SUM(`amount`), 2) AS `total_earned` FROM `payments` WHERE `date` BETWEEN '{$data->date->start_date_query}' AND DATE_ADD('{$data->date->end_date_query}', INTERVAL 1 DAY) GROUP BY `formatted_date`");
                while($row = $result->fetch_object()) {

                    $logs_chart[$row->formatted_date] = [
                        'total_earned' => $row->total_earned,
                        'total_sales' => $row->total_sales
                    ];

                }

                $logs_chart = get_chart_data($logs_chart);
                ?>


                <?php while($sales = $sales_data->fetch_object()): ?>
                    <h6 class="text-muted">
                        <?= sprintf($this->language->admin_statistics->sales->subheader, '<span class="text-info">' . $sales->count . '</span>', '<span class="text-success">' . number_format($sales->earnings, 2) . '</span>', $sales->currency) ?>
                    </h6>
                <?php endwhile ?>

                <div class="chart-container">
                    <canvas id="payments"></canvas>
                </div>

            <?php endif ?>
        </div>
    </div>

    <?php ob_start() ?>
    <script>
        /* Display chart */
        new Chart(document.getElementById('payments').getContext('2d'), {
            type: 'line',
            data: {
                labels: <?= $logs_chart['labels'] ?? '[]' ?>,
                datasets: [{
                    label: <?= json_encode($this->language->admin_statistics->sales->chart_total_sales) ?>,
                    data: <?= $logs_chart['total_sales'] ?? '[]' ?>,
                    backgroundColor: '#237f52',
                    borderColor: '#237f52',
                    fill: false
                },
                {
                    label: <?= json_encode($this->language->admin_statistics->sales->chart_total_earned) ?>,
                    data: <?= $logs_chart['total_earned'] ?? '[]' ?>,
                    backgroundColor: '#37D28D',
                    borderColor: '#37D28D',
                    fill: false
                }]
            },
            options: {
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                title: {
                    text: '',
                    display: true
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            userCallback: (value, index, values) => {
                                if (Math.floor(value) === value) {
                                    return nr(value);
                                }
                            },
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
    <?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>
<?php endif ?>

<?php
$logs_chart = [];
$result = $this->database->query("    
    SELECT 
        formatted_date, 
        SUM(users) AS `users`, 
        SUM(projects) AS `projects`,
        SUM(links) AS `links`
    FROM (
        SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS `formatted_date`, COUNT(*) AS `users`, 0 AS `projects`, 0 AS `links`
        FROM `users`
        WHERE `date` BETWEEN '{$data->date->start_date_query}' AND DATE_ADD('{$data->date->end_date_query}', INTERVAL 1 DAY)
        GROUP BY `formatted_date`
        
        UNION ALL
        
        SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS `formatted_date`, 0 AS `users`, COUNT(*) AS `projects`, 0 AS `links`
        FROM `projects`
        WHERE `date` BETWEEN '{$data->date->start_date_query}' AND DATE_ADD('{$data->date->end_date_query}', INTERVAL 1 DAY)
        GROUP BY `formatted_date`
        
        UNION ALL
        
        SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS `formatted_date`, 0 AS `users`, 0 AS `projects`, COUNT(*) AS `links`
        FROM `links`
        WHERE `date` BETWEEN '{$data->date->start_date_query}' AND DATE_ADD('{$data->date->end_date_query}', INTERVAL 1 DAY)
        GROUP BY `formatted_date`
    ) AS `altumcode`
    
    GROUP BY `formatted_date`;
");
while($row = $result->fetch_object()) {

    $logs_chart[$row->formatted_date] = [
        'users' => $row->users,
        'projects' => $row->projects,
        'links' => $row->links
    ];

}

$logs_chart = get_chart_data($logs_chart);
?>

<div class="card border-0 shadow-sm mb-5">
    <div class="card-body">
        <h2 class="h4"><i class="fa fa-seedling fa-xs text-muted"></i> <?= $this->language->admin_statistics->growth->header ?></h2>
        <p class="text-muted"><?= $this->language->admin_statistics->growth->subheader ?></p>

        <div class="chart-container">
            <canvas id="growth"></canvas>
        </div>

    </div>
</div>

<?php ob_start() ?>
<script>
    /* Display chart */
    new Chart(document.getElementById('growth').getContext('2d'), {
        type: 'bar',
        data: {
            labels: <?= $logs_chart['labels'] ?>,
            datasets: [{
                label: <?= json_encode($this->language->admin_statistics->growth->chart_users) ?>,
                data: <?= $logs_chart['users'] ?? '[]' ?>,
                backgroundColor: '#007bff',
                borderColor: '#007bff',
                fill: false
            },
            {
                label: <?= json_encode($this->language->admin_statistics->growth->chart_projects) ?>,
                data: <?= $logs_chart['projects'] ?? '[]' ?>,
                backgroundColor:'#9684F7',
                borderColor:'#9684F7',
                fill: false
            },
            {
                label: <?= json_encode($this->language->admin_statistics->growth->chart_links) ?>,
                data: <?= $logs_chart['links'] ?? '[]' ?>,
                backgroundColor: '#f75581',
                borderColor: '#f75581',
                fill: false
            }]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false
            },
            title: {
                text: '',
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        userCallback: (value, index, values) => {
                            if (Math.floor(value) === value) {
                                return nr(value);
                            }
                        },
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>


<?php
/* Get data needed for statistics from the database */
$logs = [];
$logs_chart = [];
$logs_data = [
    'location'      => [],
    'os'            => [],
    'browser'       => [],
    'referer'       => []
];

$logs_result = $this->database->query("
    SELECT
         `location`,
         `os`,
         `browser`,
         `referer`,
         `count`,
         DATE_FORMAT(`date`, '%Y-%m-%d') AS `formatted_date`
    FROM
         `track_links`
    WHERE
         (`date` BETWEEN '{$data->date->start_date_query}' AND '{$data->date->end_date_query}')
    ORDER BY
        `formatted_date`
");

/* Generate the raw chart data and save logs for later usage */
while($row = $logs_result->fetch_object()) {
    $logs[] = $row;

    /* Handle if the date key is not already set */
    if(!array_key_exists($row->formatted_date, $logs_chart)) {
        $logs_chart[$row->formatted_date] = [
            'impression'        => 0,
            'unique'            => 0,
        ];
    }

    /* Distribute the data from the database row */
    $logs_chart[$row->formatted_date]['unique']++;
    $logs_chart[$row->formatted_date]['impression'] += $row->count;

    if(!array_key_exists($row->location, $logs_data['location'])) {
        $logs_data['location'][$row->location ?? 'false'] = 1;
    } else {
        $logs_data['location'][$row->location]++;
    }

    if(!array_key_exists($row->os, $logs_data['os'])) {
        $logs_data['os'][$row->os ?? 'N/A'] = 1;
    } else {
        $logs_data['os'][$row->os]++;
    }

    if(!array_key_exists($row->browser, $logs_data['browser'])) {
        $logs_data['browser'][$row->browser ?? 'N/A'] = 1;
    } else {
        $logs_data['browser'][$row->browser]++;
    }

    if(!array_key_exists($row->referer, $logs_data['referer'])) {
        $logs_data['referer'][$row->referer ?? 'false'] = 1;
    } else {
        $logs_data['referer'][$row->referer]++;
    }
}

$logs_chart = get_chart_data($logs_chart);

arsort($logs_data['referer']);
arsort($logs_data['browser']);
arsort($logs_data['os']);
arsort($logs_data['location']);
?>

<div class="card border-0 shadow-sm mb-5">
    <div class="card-body">
        <h2 class="h4"><i class="fa fa-bell fa-xs text-muted"></i> <?= $this->language->admin_statistics->track_links->header ?></h2>
        <p class="text-muted"><?= $this->language->admin_statistics->track_links->subheader ?></p>

        <div class="chart-container">
            <canvas id="clicks_chart"></canvas>
        </div>

    </div>
</div>

<?php ob_start() ?>
<script>
    /* Display chart */
    let clicks_chart = document.getElementById('clicks_chart').getContext('2d');

    let gradient = clicks_chart.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(43, 227, 155, 0.6)');
    gradient.addColorStop(1, 'rgba(43, 227, 155, 0.05)');

    let gradient_white = clicks_chart.createLinearGradient(0, 0, 0, 250);
    gradient_white.addColorStop(0, 'rgba(255, 255, 255, 0.6)');
    gradient_white.addColorStop(1, 'rgba(255, 255, 255, 0.05)');

    new Chart(clicks_chart, {
        type: 'line',
        data: {
            labels: <?= $logs_chart['labels'] ?>,
            datasets: [{
                label: <?= json_encode($this->language->admin_statistics->track_links->impression) ?>,
                data: <?= $logs_chart['impression'] ?? '[]' ?>,
                backgroundColor: gradient,
                borderColor: '#2BE39B',
                fill: true
            },
                {
                    label: <?= json_encode($this->language->admin_statistics->track_links->unique) ?>,
                    data: <?= $logs_chart['unique'] ?? '[]' ?>,
                    backgroundColor: gradient_white,
                    borderColor: '#ebebeb',
                    fill: true
                }]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    label: (tooltipItem, data) => {
                        let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                        return `${nr(value)} ${data.datasets[tooltipItem.datasetIndex].label}`;
                    }
                }
            },
            title: {
                display: true,
                text: <?= json_encode($this->language->admin_statistics->track_links->clicks_chart) ?>
            },
            legend: {
                display: true
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        userCallback: (value, index, values) => {
                            if (Math.floor(value) === value) {
                                return nr(value);
                            }
                        }
                    },
                    min: 0
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

<div class="row mb-5">
    <div class="col-12 col-md mr-md-4 card shadow-sm border-0">
        <div class="card-body">
            <h3 class="h5"><?= $this->language->admin_statistics->track_links->referer ?></h3>
            <p class="text-muted mb-3"><?= $this->language->admin_statistics->track_links->referer_help ?></p>

            <?php foreach($logs_data['referer'] as $key => $value): ?>
                <div class="row">
                    <div class="col">

                        <?php if($key == 'false'): ?>
                            <span><?= $this->language->admin_statistics->track_links->referer_direct ?></span>
                        <?php else: ?>
                            <img src="https://www.google.com/s2/favicons?domain=<?= $key ?>" class="img-fluid mr-1" />
                            <a href="<?= $key ?>" title="<?= $key ?>"><?= string_truncate($key, 48) ?></a>
                        <?php endif ?>

                    </div>

                    <div class="col-auto">
                        <span class="badge badge-pill badge-primary"><?= nr($value) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-12 col-md ml-md-4 card shadow-sm border-0">
        <div class="card-body">
            <h3 class="h5"><?= $this->language->admin_statistics->track_links->location ?></h3>
            <p class="text-muted mb-3"><?= $this->language->admin_statistics->track_links->location_help ?></p>

            <?php foreach($logs_data['location'] as $key => $value): ?>
                <div class="row">
                    <div class="col">
                        <?php if($key != 'false'): ?>
                            <img src="https://www.countryflags.io/<?= $key ?>/flat/16.png" class="img-fluid mr-1" />
                            <?= get_country_from_country_code($key) ?>
                        <?php else: ?>
                            N/A
                        <?php endif ?>
                    </div>

                    <div class="col-auto">
                        <span class="badge badge-pill badge-primary"><?= nr($value) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12 col-md mr-md-4 card shadow-sm border-0">
        <div class="card-body">
            <h3 class="h5"><?= $this->language->admin_statistics->track_links->browser ?></h3>
            <p class="text-muted mb-3"><?= $this->language->admin_statistics->track_links->browser_help ?></p>

            <?php foreach($logs_data['browser'] as $key => $value): ?>
                <div class="row">
                    <div class="col">
                        <?= $key == 'false' ? 'N/A' : $key ?>
                    </div>

                    <div class="col-auto">
                        <span class="badge badge-pill badge-primary"><?= nr($value) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-12 col-md ml-md-4 card shadow-sm border-0">
        <div class="card-body">
            <h3 class="h5"><?= $this->language->admin_statistics->track_links->os ?></h3>
            <p class="text-muted mb-3"><?= $this->language->admin_statistics->track_links->os_help ?></p>

            <?php foreach($logs_data['os'] as $key => $value): ?>
                <div class="row">
                    <div class="col">
                        <?= $key == 'false' ? 'N/A' : $key ?>
                    </div>

                    <div class="col-auto">
                        <span class="badge badge-pill badge-primary"><?= nr($value) ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<hr class="my-5" />

<div class="mb-5">
    <h2 class="h4"><?= $this->language->admin_statistics->top_packages->header ?></h2>
    <p class="text-muted"><?= $this->language->admin_statistics->top_packages->subheader ?></p>

    <div class="mt-5 table-responsive table-custom-container">
        <table class="table table-custom">
            <thead class="thead-black">
            <tr>
                <th><?= $this->language->admin_statistics->top_packages->package_id ?></th>
                <th><?= $this->language->admin_statistics->top_packages->total ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result = $this->database->query("SELECT COUNT(*) AS `total`, `package_id` FROM `users` GROUP BY `package_id`");
            while($row = $result->fetch_object()):
                ?>
                <tr>
                    <td><?= (new \Altum\Models\Package(['settings' => $this->settings]))->get_package_by_id($row->package_id)->name ?></td>
                    <td><?= $row->total ?></td>
                </tr>

            <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>
