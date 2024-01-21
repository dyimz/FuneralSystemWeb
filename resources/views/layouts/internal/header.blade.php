
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/css/demo.css" />
  
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/apex-charts/apex-charts.css" />


    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/select2/select2.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/typeahead-js/typeahead.css" /> 
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/flatpickr/flatpickr.css" />

    <!-- Row Group CSS -->
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <!-- Form Validation -->
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />

    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />

    
    <!-- Helpers -->
    <script src="../../../../../../../../../../../../../../../../../../../../../../assets/vendor/js/helpers.js"></script>
    <script src="../../../../../../../../../../../../../../../../../../../../../../assets/js/config.js"></script>


    <!-- FOR PUSHER -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('f84b3cc7205016b1f30d', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('notify-channel');
        channel.bind('notify-event', function(data) {

            // alert(JSON.stringify(data.name));

            var newNotification = document.createElement('li');
            
            newNotification.id = 'notificationItem';
            newNotification.className = 'list-group-item list-group-item-action dropdown-notifications-item';

            // Build the content of the new notification
            var notificationContent = `
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                            <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-1">Cremation Request!</h6>
                        <p class="mb-0">Order #${data.id} requested Cremation for their order.</p>
                        <small class="text-muted">a while ago</small>
                    </div>
                    <div class="flex-shrink-0 dropdown-notifications-actions">
                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                    </div>
                </div>
            `;

            // Set the HTML content of the new notification
            newNotification.innerHTML = notificationContent;
            // Add a click event listener to the new notification

            newNotification.addEventListener('click', function() {
                // Navigate to the desired route
                window.location.href = `/admin/orders/${data.id}/edit`;
            });

            // Get the notification list and insert the new notification at the beginning
            var notificationList = document.querySelector('.dropdown-notifications-list ul');
            notificationList.insertBefore(newNotification, notificationList.firstChild);

            // Update the notifications count badge (if needed)
            var notificationsCountBadge = document.querySelector('.badge-notifications');
            notificationsCountBadge.textContent = parseInt(notificationsCountBadge.textContent) + 1;

        });

    </script>

</head>