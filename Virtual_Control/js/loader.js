function load(index) {
    load_logo();
    load_footer();
    switch(index) {
        case 1: // Header (User)
            load_user_header();
            break;
        case 2: // Header (Guest)
            load_guest_header();
            break;
        default:
            break;
    }
}

function load_logo() {
   var data = '<div class="row">'
            + '<div class="col-md-12">'
            + '<svg viewBox="0 0 106.53 18.638" xmlns="http://www.w3.org/2000/svg" fill="#000" version="1.1" width="100%" height="100px">'
            + '<g transform="translate(-35.835 -38.875)">'
            + '<path d="m43.285 38.875v11.51h-5.4704v-11.505c-1.2387 1.5318-1.9763 4.006-1.9789 6.6455-2.39e-4 4.5173 2.1109 8.1796 4.7141 8.1792 2.6032 3.7e-4 4.712-3.662 4.7118-8.1792-0.0017-2.641-0.73723-5.1182-1.9766-6.6508zm50.155 4.4828v9.5148h1.9834v-9.5148zm46.947 0v9.5148h1.9834v-9.5148zm-74.813 0.03164c-0.33473 0-0.60845 0.0942-0.82184 0.28248-0.2134 0.18829-0.32015 0.43136-0.32015 0.72844 0 0.2887 0.10675 0.53286 0.32015 0.7337 0.21338 0.19664 0.48711 0.29529 0.82184 0.29529 0.33892 0 0.61338-0.09605 0.82259-0.28851 0.2134-0.19247 0.32015-0.43923 0.32015-0.74048 0-0.29708-0.10675-0.54015-0.32015-0.72844-0.2092-0.18829-0.48368-0.28248-0.82259-0.28248zm10.601 1.1051-1.9774 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.6989 2.1778 2.0964 2.1778 0.58996 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22175 0.12134-0.43712 0.18154-0.64632 0.18154-0.53139 0-0.79698-0.33467-0.79698-1.0041v-2.5981h1.4433v-1.4621h-1.4433zm48.728 0-1.9766 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.69892 2.1778 2.0964 2.1778 0.58999 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22178 0.12134-0.43712 0.18154-0.64632 0.18154-0.53141 0-0.79774-0.33467-0.79774-1.0041v-2.5981h1.4441v-1.4621h-1.4441zm-35.793 1.7943c-0.39313 6.6e-5 -0.83059 0.05475-1.3115 0.16346-0.477 0.10878-0.85379 0.23438-1.1299 0.37664v1.4938c0.69038-0.45607 1.4188-0.68399 2.1845-0.68399 0.76152 0 1.142 0.35092 1.142 1.0539l-1.7446 0.23277c-1.477 0.19247-2.2154 0.91205-2.2154 2.1589 0 0.58997 0.17768 1.0628 0.53333 1.4184 0.35984 0.35147 0.8515 0.52731 1.4749 0.52731 0.8452 0 1.4831-0.35979 1.9141-1.0795h0.02561v0.92203h1.8764v-3.841c0-1.8282-0.91662-2.7425-2.7488-2.7427zm14.762 0c-1.0962 0-1.9728 0.31583-2.6297 0.94764-0.65273 0.62762-0.97928 1.488-0.97928 2.58 0 0.94562 0.30511 1.7173 0.916 2.3156 0.61089 0.59833 1.4103 0.89793 2.3977 0.89793 0.8452 0 1.492-0.13003 1.9397-0.38945v-1.594c-0.47281 0.30963-0.95636 0.46402-1.4501 0.46402-0.55649 0-0.99348-0.16068-1.3115-0.48286-0.318-0.32636-0.47683-0.77408-0.47683-1.3431 0-0.58578 0.1651-1.0442 0.49566-1.3748 0.33474-0.33473 0.78613-0.50169 1.3552-0.50169 0.51046 0 0.97335 0.15441 1.3876 0.46403v-1.6821c-0.33891-0.20085-0.88712-0.30132-1.6444-0.30132zm6.1002 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63599 0.59834-0.95442 1.4291-0.95442 2.4919 0 1.0293 0.30587 1.8449 0.91675 2.4474 0.61507 0.59833 1.4584 0.89793 2.5296 0.89793 1.0879 0 1.943-0.30956 2.5665-0.92881 0.62763-0.61926 0.94162-1.4626 0.94162-2.5296 0-0.98746-0.3033-1.7806-0.90998-2.3789-0.6067-0.60252-1.4438-0.90395-2.5107-0.90395zm8.7804 0c-0.90378 0-1.592 0.39119-2.0648 1.1736h-0.0249v-1.0162h-1.9834v6.4263h1.9834v-3.6648c0-0.40586 0.11048-0.74054 0.3322-1.0041 0.22179-0.2636 0.50434-0.39548 0.84745-0.39548 0.7113 0 1.0667 0.49795 1.0667 1.4938v3.5706h1.9774v-3.9352c0-1.7657-0.71147-2.6486-2.1341-2.6486zm16.927 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63602 0.59834-0.95443 1.4291-0.95443 2.4919 0 1.0293 0.30586 1.8449 0.91676 2.4474 0.61507 0.59833 1.4577 0.89793 2.5288 0.89793 1.0879 0 1.9438-0.30956 2.5672-0.92881 0.62763-0.61926 0.94161-1.4626 0.94161-2.5296 0-0.98746-0.30324-1.7806-0.90997-2.3789-0.60669-0.60252-1.4438-0.90395-2.5107-0.90395zm-63.741 0.04444c-0.81591 0-1.3811 0.43515-1.6949 1.3055h-0.02486v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12116-0.97281 0.36384-1.2866 0.2427-0.318 0.57995-0.47683 1.0109-0.47683 0.31799 0 0.59615 0.06463 0.83465 0.19435v-1.826c-0.11716-0.0502-0.28042-0.07533-0.48964-0.07533zm59.222 0c-0.8159 0-1.3804 0.43515-1.6942 1.3055h-0.0256v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12111-0.97281 0.36385-1.2866 0.24266-0.318 0.57994-0.47683 1.0109-0.47683 0.31801 0 0.59614 0.06463 0.83465 0.19435v-1.826c-0.11705-0.0502-0.28056-0.07533-0.48964-0.07533zm-74.379 0.11299 2.278 6.4263h2.2591l2.3917-6.4263h-2.0716l-1.142 3.9977c-0.12554 0.43934-0.20272 0.80725-0.23201 1.1043h-0.02561c-0.02087-0.31381-0.09367-0.69428-0.2192-1.142l-1.1171-3.9601zm7.7883 0v6.4263h1.9834v-6.4263zm14.059 0v3.8787c0 1.8034 0.74545 2.7051 2.235 2.7051 0.8201 0 1.4743-0.37863 1.9638-1.136h0.03164v0.97853h1.9774v-6.4263h-1.9774v3.6776c0 0.42678-0.10677 0.76589-0.32015 1.0169-0.21341 0.24687-0.49783 0.36986-0.85348 0.36986-0.71967 0-1.0795-0.45399-1.0795-1.362v-3.7024zm31.306 1.362c0.9582 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47467 1.9013-1.4245 1.9013-0.99582 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.13005-1.0465 0.38946-1.3687 0.25941-0.32218 0.62289-0.48286 1.0915-0.48286zm25.708 0c0.95818 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47466 1.9013-1.4245 1.9013-0.99584 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.1293-1.0465 0.3887-1.3687 0.25931-0.32218 0.62365-0.48286 1.0923-0.48286zm-85.997 0.27872c-2.6032-2.39e-4 -4.712 2.1087-4.7118 4.7118-1.89e-4 2.6033 2.1087 4.7143 4.7118 4.7141 1.5218-0.0019 2.9503-0.73916 3.8335-1.9781h-6.3909l2.7194-5.4712h3.6685c-0.88266-1.2388-2.3095-1.9741-3.8305-1.9766zm40.35 1.7424v0.43239c0 0.39331-0.11677 0.71986-0.35104 0.97928-0.23431 0.25522-0.53758 0.38267-0.90998 0.38267-0.26777 0-0.4813-0.07091-0.6403-0.21318-0.15483-0.14645-0.23277-0.33224-0.23277-0.55819 0-0.49792 0.32286-0.78938 0.96723-0.87306zm-50.883 0.98305c0.35202 1.58e-4 0.63698 0.28518 0.63804 0.63728-1.58e-4 0.35264-0.2854 0.63863-0.63804 0.63879-0.35264-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28679-0.63712 0.63879-0.63728zm2.8776 0c0.35266-7.45e-4 0.63924 0.28457 0.6403 0.63728-1.58e-4 0.35327-0.28684 0.63954-0.6403 0.63879-0.35266-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28676-0.63712 0.63879-0.63728zm5.1653 0.07985c0.46293-7.98e-4 0.83831 0.37476 0.83841 0.83766-9.53e-4 0.46229-0.37613 0.83622-0.83841 0.8354-0.46104-9.57e-4 -0.83445-0.37434-0.8354-0.8354 1.04e-4 -0.46168 0.37375-0.83668 0.8354-0.83766z"></path>'
            + '</g>'
            + '</svg></div>'
            + '<div class="col-md-12">'
            + '<h3 class="text-center" style=""><span class="badge badge-dark text-monospace">A Controlling Networks Tool.</span></h3>'
            + '</div>'
            + '</div>';
    document.getElementById('logo').innerHTML = data;
}

function load_user_header() {
    var data = '<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="box-shadow: black 0px 0px 4px;">'
            + '<div class="container"> <a class="navbar-brand" href="index.php" style=""><svg width="12em" version="1.1" viewBox="0 0 106.53 18.638" xmlns="http://www.w3.org/2000/svg" fill="#ff5a00">'
            + '<g transform="translate(-35.835 -38.875)">'
            + '<path d="m43.285 38.875v11.51h-5.4704v-11.505c-1.2387 1.5318-1.9763 4.006-1.9789 6.6455-2.39e-4 4.5173 2.1109 8.1796 4.7141 8.1792 2.6032 3.7e-4 4.712-3.662 4.7118-8.1792-0.0017-2.641-0.73723-5.1182-1.9766-6.6508zm50.155 4.4828v9.5148h1.9834v-9.5148zm46.947 0v9.5148h1.9834v-9.5148zm-74.813 0.03164c-0.33473 0-0.60845 0.0942-0.82184 0.28248-0.2134 0.18829-0.32015 0.43136-0.32015 0.72844 0 0.2887 0.10675 0.53286 0.32015 0.7337 0.21338 0.19664 0.48711 0.29529 0.82184 0.29529 0.33892 0 0.61338-0.09605 0.82259-0.28851 0.2134-0.19247 0.32015-0.43923 0.32015-0.74048 0-0.29708-0.10675-0.54015-0.32015-0.72844-0.2092-0.18829-0.48368-0.28248-0.82259-0.28248zm10.601 1.1051-1.9774 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.6989 2.1778 2.0964 2.1778 0.58996 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22175 0.12134-0.43712 0.18154-0.64632 0.18154-0.53139 0-0.79698-0.33467-0.79698-1.0041v-2.5981h1.4433v-1.4621h-1.4433zm48.728 0-1.9766 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.69892 2.1778 2.0964 2.1778 0.58999 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22178 0.12134-0.43712 0.18154-0.64632 0.18154-0.53141 0-0.79774-0.33467-0.79774-1.0041v-2.5981h1.4441v-1.4621h-1.4441zm-35.793 1.7943c-0.39313 6.6e-5 -0.83059 0.05475-1.3115 0.16346-0.477 0.10878-0.85379 0.23438-1.1299 0.37664v1.4938c0.69038-0.45607 1.4188-0.68399 2.1845-0.68399 0.76152 0 1.142 0.35092 1.142 1.0539l-1.7446 0.23277c-1.477 0.19247-2.2154 0.91205-2.2154 2.1589 0 0.58997 0.17768 1.0628 0.53333 1.4184 0.35984 0.35147 0.8515 0.52731 1.4749 0.52731 0.8452 0 1.4831-0.35979 1.9141-1.0795h0.02561v0.92203h1.8764v-3.841c0-1.8282-0.91662-2.7425-2.7488-2.7427zm14.762 0c-1.0962 0-1.9728 0.31583-2.6297 0.94764-0.65273 0.62762-0.97928 1.488-0.97928 2.58 0 0.94562 0.30511 1.7173 0.916 2.3156 0.61089 0.59833 1.4103 0.89793 2.3977 0.89793 0.8452 0 1.492-0.13003 1.9397-0.38945v-1.594c-0.47281 0.30963-0.95636 0.46402-1.4501 0.46402-0.55649 0-0.99348-0.16068-1.3115-0.48286-0.318-0.32636-0.47683-0.77408-0.47683-1.3431 0-0.58578 0.1651-1.0442 0.49566-1.3748 0.33474-0.33473 0.78613-0.50169 1.3552-0.50169 0.51046 0 0.97335 0.15441 1.3876 0.46403v-1.6821c-0.33891-0.20085-0.88712-0.30132-1.6444-0.30132zm6.1002 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63599 0.59834-0.95442 1.4291-0.95442 2.4919 0 1.0293 0.30587 1.8449 0.91675 2.4474 0.61507 0.59833 1.4584 0.89793 2.5296 0.89793 1.0879 0 1.943-0.30956 2.5665-0.92881 0.62763-0.61926 0.94162-1.4626 0.94162-2.5296 0-0.98746-0.3033-1.7806-0.90998-2.3789-0.6067-0.60252-1.4438-0.90395-2.5107-0.90395zm8.7804 0c-0.90378 0-1.592 0.39119-2.0648 1.1736h-0.0249v-1.0162h-1.9834v6.4263h1.9834v-3.6648c0-0.40586 0.11048-0.74054 0.3322-1.0041 0.22179-0.2636 0.50434-0.39548 0.84745-0.39548 0.7113 0 1.0667 0.49795 1.0667 1.4938v3.5706h1.9774v-3.9352c0-1.7657-0.71147-2.6486-2.1341-2.6486zm16.927 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63602 0.59834-0.95443 1.4291-0.95443 2.4919 0 1.0293 0.30586 1.8449 0.91676 2.4474 0.61507 0.59833 1.4577 0.89793 2.5288 0.89793 1.0879 0 1.9438-0.30956 2.5672-0.92881 0.62763-0.61926 0.94161-1.4626 0.94161-2.5296 0-0.98746-0.30324-1.7806-0.90997-2.3789-0.60669-0.60252-1.4438-0.90395-2.5107-0.90395zm-63.741 0.04444c-0.81591 0-1.3811 0.43515-1.6949 1.3055h-0.02486v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12116-0.97281 0.36384-1.2866 0.2427-0.318 0.57995-0.47683 1.0109-0.47683 0.31799 0 0.59615 0.06463 0.83465 0.19435v-1.826c-0.11716-0.0502-0.28042-0.07533-0.48964-0.07533zm59.222 0c-0.8159 0-1.3804 0.43515-1.6942 1.3055h-0.0256v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12111-0.97281 0.36385-1.2866 0.24266-0.318 0.57994-0.47683 1.0109-0.47683 0.31801 0 0.59614 0.06463 0.83465 0.19435v-1.826c-0.11705-0.0502-0.28056-0.07533-0.48964-0.07533zm-74.379 0.11299 2.278 6.4263h2.2591l2.3917-6.4263h-2.0716l-1.142 3.9977c-0.12554 0.43934-0.20272 0.80725-0.23201 1.1043h-0.02561c-0.02087-0.31381-0.09367-0.69428-0.2192-1.142l-1.1171-3.9601zm7.7883 0v6.4263h1.9834v-6.4263zm14.059 0v3.8787c0 1.8034 0.74545 2.7051 2.235 2.7051 0.8201 0 1.4743-0.37863 1.9638-1.136h0.03164v0.97853h1.9774v-6.4263h-1.9774v3.6776c0 0.42678-0.10677 0.76589-0.32015 1.0169-0.21341 0.24687-0.49783 0.36986-0.85348 0.36986-0.71967 0-1.0795-0.45399-1.0795-1.362v-3.7024zm31.306 1.362c0.9582 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47467 1.9013-1.4245 1.9013-0.99582 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.13005-1.0465 0.38946-1.3687 0.25941-0.32218 0.62289-0.48286 1.0915-0.48286zm25.708 0c0.95818 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47466 1.9013-1.4245 1.9013-0.99584 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.1293-1.0465 0.3887-1.3687 0.25931-0.32218 0.62365-0.48286 1.0923-0.48286zm-85.997 0.27872c-2.6032-2.39e-4 -4.712 2.1087-4.7118 4.7118-1.89e-4 2.6033 2.1087 4.7143 4.7118 4.7141 1.5218-0.0019 2.9503-0.73916 3.8335-1.9781h-6.3909l2.7194-5.4712h3.6685c-0.88266-1.2388-2.3095-1.9741-3.8305-1.9766zm40.35 1.7424v0.43239c0 0.39331-0.11677 0.71986-0.35104 0.97928-0.23431 0.25522-0.53758 0.38267-0.90998 0.38267-0.26777 0-0.4813-0.07091-0.6403-0.21318-0.15483-0.14645-0.23277-0.33224-0.23277-0.55819 0-0.49792 0.32286-0.78938 0.96723-0.87306zm-50.883 0.98305c0.35202 1.58e-4 0.63698 0.28518 0.63804 0.63728-1.58e-4 0.35264-0.2854 0.63863-0.63804 0.63879-0.35264-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28679-0.63712 0.63879-0.63728zm2.8776 0c0.35266-7.45e-4 0.63924 0.28457 0.6403 0.63728-1.58e-4 0.35327-0.28684 0.63954-0.6403 0.63879-0.35266-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28676-0.63712 0.63879-0.63728zm5.1653 0.07985c0.46293-7.98e-4 0.83831 0.37476 0.83841 0.83766-9.53e-4 0.46229-0.37613 0.83622-0.83841 0.8354-0.46104-9.57e-4 -0.83445-0.37434-0.8354-0.8354 1.04e-4 -0.46168 0.37375-0.83668 0.8354-0.83766z"></path>'
            + '</g>'
            + '</svg>'
            + '<br></a> <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon" style=""></span> </button>'
            + '<div class="navbar-collapse text-center justify-content-end collapse" id="navbar2SupportedContent">'
            + '<ul class="navbar-nav w-100">'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-home fa-2x"></i><span class="navbar-text">HOME</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="analy.php"><i class="fa fa-fw fa-2x fa-bar-chart"></i><span class="navbar-text">ANALYTICS</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="warn.php"><i class="fa fa-fw fa-2x fa-exclamation-triangle"></i><span class="navbar-text">WARNINGS</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="https://github.com/ClearNB/Virtual-Control"><i class="fa fa-fw fa-2x fa-github"></i><span class="navbar-text">GITHUB</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="option.php"><i class="fa fa-fw fa-2x fa-wrench"></i><span class="navbar-text">OPTION</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="help.php"><i class="fa fa-fw fa-2x fa-info-circle"></i><span class="navbar-text">HELP</span></a> </li>'
            + '<li class="nav-item mx-auto"> <a class="nav-link active" href="logout.php"><i class="fa fa-fw fa-2x fa-power-off text-danger"></i><span class="navbar-text text-danger">LOGOUT</span></a> </li>'
            + '</ul>'
            + '</div>'
            + '</div>'
            + '</nav>';
    document.getElementById('nav').innerHTML = data;
}

function load_guest_header() {
    var data = '<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="box-shadow: 0px 0px 4px  black;">'
         + '<div class="container"> <a class="navbar-brand" href="index.php" style=""><svg width="12em" version="1.1" viewBox="0 0 106.53 18.638" xmlns="http://www.w3.org/2000/svg" fill="#ff5a00">'
         + '<g transform="translate(-35.835 -38.875)">'
         + '<path d="m43.285 38.875v11.51h-5.4704v-11.505c-1.2387 1.5318-1.9763 4.006-1.9789 6.6455-2.39e-4 4.5173 2.1109 8.1796 4.7141 8.1792 2.6032 3.7e-4 4.712-3.662 4.7118-8.1792-0.0017-2.641-0.73723-5.1182-1.9766-6.6508zm50.155 4.4828v9.5148h1.9834v-9.5148zm46.947 0v9.5148h1.9834v-9.5148zm-74.813 0.03164c-0.33473 0-0.60845 0.0942-0.82184 0.28248-0.2134 0.18829-0.32015 0.43136-0.32015 0.72844 0 0.2887 0.10675 0.53286 0.32015 0.7337 0.21338 0.19664 0.48711 0.29529 0.82184 0.29529 0.33892 0 0.61338-0.09605 0.82259-0.28851 0.2134-0.19247 0.32015-0.43923 0.32015-0.74048 0-0.29708-0.10675-0.54015-0.32015-0.72844-0.2092-0.18829-0.48368-0.28248-0.82259-0.28248zm10.601 1.1051-1.9774 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.6989 2.1778 2.0964 2.1778 0.58996 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22175 0.12134-0.43712 0.18154-0.64632 0.18154-0.53139 0-0.79698-0.33467-0.79698-1.0041v-2.5981h1.4433v-1.4621h-1.4433zm48.728 0-1.9766 0.56422v1.3876h-1.0418v1.4621h1.0418v2.9439c0 1.4519 0.69892 2.1778 2.0964 2.1778 0.58999 0 1.0314-0.07795 1.3243-0.23277v-1.4682c-0.22178 0.12134-0.43712 0.18154-0.64632 0.18154-0.53141 0-0.79774-0.33467-0.79774-1.0041v-2.5981h1.4441v-1.4621h-1.4441zm-35.793 1.7943c-0.39313 6.6e-5 -0.83059 0.05475-1.3115 0.16346-0.477 0.10878-0.85379 0.23438-1.1299 0.37664v1.4938c0.69038-0.45607 1.4188-0.68399 2.1845-0.68399 0.76152 0 1.142 0.35092 1.142 1.0539l-1.7446 0.23277c-1.477 0.19247-2.2154 0.91205-2.2154 2.1589 0 0.58997 0.17768 1.0628 0.53333 1.4184 0.35984 0.35147 0.8515 0.52731 1.4749 0.52731 0.8452 0 1.4831-0.35979 1.9141-1.0795h0.02561v0.92203h1.8764v-3.841c0-1.8282-0.91662-2.7425-2.7488-2.7427zm14.762 0c-1.0962 0-1.9728 0.31583-2.6297 0.94764-0.65273 0.62762-0.97928 1.488-0.97928 2.58 0 0.94562 0.30511 1.7173 0.916 2.3156 0.61089 0.59833 1.4103 0.89793 2.3977 0.89793 0.8452 0 1.492-0.13003 1.9397-0.38945v-1.594c-0.47281 0.30963-0.95636 0.46402-1.4501 0.46402-0.55649 0-0.99348-0.16068-1.3115-0.48286-0.318-0.32636-0.47683-0.77408-0.47683-1.3431 0-0.58578 0.1651-1.0442 0.49566-1.3748 0.33474-0.33473 0.78613-0.50169 1.3552-0.50169 0.51046 0 0.97335 0.15441 1.3876 0.46403v-1.6821c-0.33891-0.20085-0.88712-0.30132-1.6444-0.30132zm6.1002 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63599 0.59834-0.95442 1.4291-0.95442 2.4919 0 1.0293 0.30587 1.8449 0.91675 2.4474 0.61507 0.59833 1.4584 0.89793 2.5296 0.89793 1.0879 0 1.943-0.30956 2.5665-0.92881 0.62763-0.61926 0.94162-1.4626 0.94162-2.5296 0-0.98746-0.3033-1.7806-0.90998-2.3789-0.6067-0.60252-1.4438-0.90395-2.5107-0.90395zm8.7804 0c-0.90378 0-1.592 0.39119-2.0648 1.1736h-0.0249v-1.0162h-1.9834v6.4263h1.9834v-3.6648c0-0.40586 0.11048-0.74054 0.3322-1.0041 0.22179-0.2636 0.50434-0.39548 0.84745-0.39548 0.7113 0 1.0667 0.49795 1.0667 1.4938v3.5706h1.9774v-3.9352c0-1.7657-0.71147-2.6486-2.1341-2.6486zm16.927 0c-1.0837 0-1.9433 0.30143-2.5793 0.90395-0.63602 0.59834-0.95443 1.4291-0.95443 2.4919 0 1.0293 0.30586 1.8449 0.91676 2.4474 0.61507 0.59833 1.4577 0.89793 2.5288 0.89793 1.0879 0 1.9438-0.30956 2.5672-0.92881 0.62763-0.61926 0.94161-1.4626 0.94161-2.5296 0-0.98746-0.30324-1.7806-0.90997-2.3789-0.60669-0.60252-1.4438-0.90395-2.5107-0.90395zm-63.741 0.04444c-0.81591 0-1.3811 0.43515-1.6949 1.3055h-0.02486v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12116-0.97281 0.36384-1.2866 0.2427-0.318 0.57995-0.47683 1.0109-0.47683 0.31799 0 0.59615 0.06463 0.83465 0.19435v-1.826c-0.11716-0.0502-0.28042-0.07533-0.48964-0.07533zm59.222 0c-0.8159 0-1.3804 0.43515-1.6942 1.3055h-0.0256v-1.1925h-1.9834v6.4263h1.9834v-3.0689c0-0.54394 0.12111-0.97281 0.36385-1.2866 0.24266-0.318 0.57994-0.47683 1.0109-0.47683 0.31801 0 0.59614 0.06463 0.83465 0.19435v-1.826c-0.11705-0.0502-0.28056-0.07533-0.48964-0.07533zm-74.379 0.11299 2.278 6.4263h2.2591l2.3917-6.4263h-2.0716l-1.142 3.9977c-0.12554 0.43934-0.20272 0.80725-0.23201 1.1043h-0.02561c-0.02087-0.31381-0.09367-0.69428-0.2192-1.142l-1.1171-3.9601zm7.7883 0v6.4263h1.9834v-6.4263zm14.059 0v3.8787c0 1.8034 0.74545 2.7051 2.235 2.7051 0.8201 0 1.4743-0.37863 1.9638-1.136h0.03164v0.97853h1.9774v-6.4263h-1.9774v3.6776c0 0.42678-0.10677 0.76589-0.32015 1.0169-0.21341 0.24687-0.49783 0.36986-0.85348 0.36986-0.71967 0-1.0795-0.45399-1.0795-1.362v-3.7024zm31.306 1.362c0.9582 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47467 1.9013-1.4245 1.9013-0.99582 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.13005-1.0465 0.38946-1.3687 0.25941-0.32218 0.62289-0.48286 1.0915-0.48286zm25.708 0c0.95818 0 1.4373 0.60027 1.4373 1.8011 0 1.2678-0.47466 1.9013-1.4245 1.9013-0.99584 0-1.4938-0.61651-1.4938-1.8508 0-0.58996 0.1293-1.0465 0.3887-1.3687 0.25931-0.32218 0.62365-0.48286 1.0923-0.48286zm-85.997 0.27872c-2.6032-2.39e-4 -4.712 2.1087-4.7118 4.7118-1.89e-4 2.6033 2.1087 4.7143 4.7118 4.7141 1.5218-0.0019 2.9503-0.73916 3.8335-1.9781h-6.3909l2.7194-5.4712h3.6685c-0.88266-1.2388-2.3095-1.9741-3.8305-1.9766zm40.35 1.7424v0.43239c0 0.39331-0.11677 0.71986-0.35104 0.97928-0.23431 0.25522-0.53758 0.38267-0.90998 0.38267-0.26777 0-0.4813-0.07091-0.6403-0.21318-0.15483-0.14645-0.23277-0.33224-0.23277-0.55819 0-0.49792 0.32286-0.78938 0.96723-0.87306zm-50.883 0.98305c0.35202 1.58e-4 0.63698 0.28518 0.63804 0.63728-1.58e-4 0.35264-0.2854 0.63863-0.63804 0.63879-0.35264-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28679-0.63712 0.63879-0.63728zm2.8776 0c0.35266-7.45e-4 0.63924 0.28457 0.6403 0.63728-1.58e-4 0.35327-0.28684 0.63954-0.6403 0.63879-0.35266-1.58e-4 -0.63863-0.28605-0.63879-0.63879 1e-3 -0.35202 0.28676-0.63712 0.63879-0.63728zm5.1653 0.07985c0.46293-7.98e-4 0.83831 0.37476 0.83841 0.83766-9.53e-4 0.46229-0.37613 0.83622-0.83841 0.8354-0.46104-9.57e-4 -0.83445-0.37434-0.8354-0.8354 1.04e-4 -0.46168 0.37375-0.83668 0.8354-0.83766z"></path>'
         + '</g>'
         + '</svg>'
         + '<br></a> <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation" style=""> <span class="navbar-toggler-icon"></span> </button>'
         + '<div class="navbar-collapse text-center justify-content-end collapse" id="navbar2SupportedContent">'
         + '<ul class="navbar-nav">'
         + '<li class="nav-item mx-2"> <a class="nav-link active" href="https://github.com/ClearNB/Virtual-Control"><i class="fa fa-fw fa-github fa-2x"></i>GitHub<br></a> </li>'
         + '<li class="nav-item mx-2"> <a class="nav-link active" href="help.php"><i class="fa fa-fw fa-info-circle fa-2x"></i>ヘルプ<br></a> </li>'
         + '</ul> <a class="btn navbar-btn text-white mx-2 btn-primary btn-sm" href="login.php"><i class="fa fa-fw fa-sign-in fa-2x"></i>ログイン<br></a>'
         + '</div>'
         + '</div>'
         + '</nav>';
    document.getElementById('nav').innerHTML = data;
}

function load_footer() {
    var data = '<div class="bg-dark pt-0">'
             + '<div class="container">'
             + '<div class="row">'
             + '<div class="col-md-12 my-3 text-center">'
             + '<p>© 2020 Project GSC All Rights Reserved.<br></p>'
             + '</div>'
             + '</div>'
             + '</div>'
             + '</div>';
    document.getElementById('foot').innerHTML = data;
}