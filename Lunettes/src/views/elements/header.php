<?php

function head()
{
?>
    <!DOCTYPE html>
    <html amp>

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="public/images/logo1.png" type="image/x-icon">
        <meta name="description" content="">
        <meta name="amp-script-src" content="">

        <title>Lunettes</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/main.css">
        <link rel="canonical" href="./">
        <style amp-boilerplate>
            body {
                -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                animation: -amp-start 8s steps(1, end) 0s 1 normal both
            }

            @-webkit-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-moz-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-ms-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-o-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }
        </style>
        <noscript>
            <style amp-boilerplate>
                body {
                    -webkit-animation: none;
                    -moz-animation: none;
                    -ms-animation: none;
                    animation: none
                }
            </style>
        </noscript>
        <link href="https://fonts.googleapis.com/css?family=Manrope:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

        <style amp-custom>
            .gdpr-block {
                padding: 10px;
                font-size: 14px;
                display: block;
                width: 100%;
                text-align: center;
            }

            .gdpr-block.covert {
                display: none;
            }

            .textGDPR {
                position: relative;
            }

            .gdpr-block label span.textGDPR input[name='gdpr'] {
                width: 15px;
                height: 15px;
                margin: 0;
                position: absolute;
                top: 2px;
                left: -20px;
            }

            .gdpr-block label {
                color: #a7a7a7;
                vertical-align: middle;
                user-select: none;
                margin-bottom: 0;
            }

            div,
            span,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            blockquote,
            a,
            ol,
            ul,
            li,
            figcaption,
            textarea,
            input {
                font: inherit;
            }

            * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                outline: none;
            }

            *:focus {
                outline: none;
            }

            body {
                position: relative;
                font-style: normal;
                line-height: 1.2;
                color: #4a4a4a;
            }

            section {
                background-color: #eeeeee;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                background-size: cover;
                overflow: hidden;
                padding: 30px 0;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            p,
            li,
            blockquote {
                letter-spacing: 0.5px;
                line-height: 1.4;
            }

            ul,
            ol,
            blockquote,
            p {
                margin-bottom: 0;
                margin-top: 0;
            }

            a {
                cursor: pointer;
            }

            a,
            a:hover {
                text-decoration: none;
            }

            a.mbr-iconfont:hover {
                text-decoration: none;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            .display-1,
            .display-2,
            .display-4,
            .display-5,
            .display-7 {
                word-break: break-word;
                word-wrap: break-word;
                font-weight: 400;
            }

            b,
            strong {
                font-weight: bold;
            }

            blockquote {
                padding: 10px 0 10px 20px;
                position: relative;
                border-left: 3px solid;
            }

            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active {
                -webkit-transition-delay: 9999s;
                transition-delay: 9999s;
                -webkit-transition-property: background-color, color;
                -o-transition-property: background-color, color;
                transition-property: background-color, color;
            }

            html,
            body {
                height: auto;
                min-height: 100vh;
            }

            .mbr-section-title {
                margin: 0;
                padding: 0;
                font-style: normal;
                line-height: 1.2;
                width: 100%;
            }

            .mbr-section-subtitle {
                line-height: 1.3;
                width: 100%;
            }

            .mbr-text {
                font-style: normal;
                line-height: 1.4;
                width: 100%;
            }

            .mbr-white {
                color: #ffffff;
            }

            .mbr-black {
                color: #000000;
            }

            .align-left {
                text-align: left;
            }

            .align-left .list-item {
                justify-content: flex-start;
            }

            .align-center {
                text-align: center;
            }

            .align-center .list-item {
                justify-content: center;
            }

            .align-right {
                text-align: right;
            }

            .align-right .list-item {
                justify-content: flex-end;
            }

            @media (max-width: 767px) {

                .align-left,
                .align-center,
                .align-right {
                    text-align: center;
                }

                .align-left .list-item,
                .align-center .list-item,
                .align-right .list-item {
                    justify-content: center;
                }
            }

            .mbr-light {
                font-weight: 300;
            }

            .mbr-regular {
                font-weight: 400;
            }

            .mbr-semibold {
                font-weight: 500;
            }

            .mbr-bold {
                font-weight: 700;
            }

            .icons-list a {
                margin: 0 1rem 0 0;
            }

            .icons-list a:last-child {
                margin: 0;
            }

            .mbr-figure {
                align-self: center;
            }

            .hidden {
                visibility: hidden;
            }

            .super-hide {
                display: none;
            }

            .inactive {
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                pointer-events: none;
                -webkit-user-drag: none;
            }

            .mbr-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                top: 0;
                z-index: 0;
            }

            .map-placeholder {
                display: none;
            }

            .google-map,
            .google-map iframe {
                position: relative;
                width: 100%;
                height: 400px;
            }

            amp-img {
                width: 100%;
            }

            amp-img img {
                max-height: 100%;
                max-width: 100%;
            }

            img.mbr-temp {
                width: 100%;
            }

            .rounded {
                border-radius: 50%;
            }

            .is-builder .nodisplay+img[async],
            .is-builder .nodisplay+img[decoding="async"],
            .is-builder amp-img>a+img[async],
            .is-builder amp-img>a+img[decoding="async"] {
                display: none;
            }

            html:not(.is-builder) amp-img>a {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 1;
            }

            .is-builder .temp-amp-sizer {
                position: absolute;
            }

            .is-builder amp-youtube .temp-amp-sizer,
            .is-builder amp-vimeo .temp-amp-sizer {
                position: static;
            }

            .mobirise-spinner {
                position: absolute;
                top: 50%;
                left: 40%;
                margin-left: 10%;
                -webkit-transform: translate3d(-50%, -50%, 0);
                z-index: 4;
            }

            .mobirise-spinner em {
                width: 24px;
                height: 24px;
                background: #3ac;
                border-radius: 100%;
                display: inline-block;
                -webkit-animation: slide 1s infinite;
            }

            .mobirise-spinner em:nth-child(1) {
                -webkit-animation-delay: 0.1s;
            }

            .mobirise-spinner em:nth-child(2) {
                -webkit-animation-delay: 0.2s;
            }

            .mobirise-spinner em:nth-child(3) {
                -webkit-animation-delay: 0.3s;
            }

            @-moz-keyframes slide {
                0% {
                    -webkit-transform: scale(1);
                }

                50% {
                    opacity: 0.3;
                    -webkit-transform: scale(2);
                }

                100% {
                    -webkit-transform: scale(1);
                }
            }

            @-webkit-keyframes slide {
                0% {
                    -webkit-transform: scale(1);
                }

                50% {
                    opacity: 0.3;
                    -webkit-transform: scale(2);
                }

                100% {
                    -webkit-transform: scale(1);
                }
            }

            @-o-keyframes slide {
                0% {
                    -webkit-transform: scale(1);
                }

                50% {
                    opacity: 0.3;
                    -webkit-transform: scale(2);
                }

                100% {
                    -webkit-transform: scale(1);
                }
            }

            @keyframes slide {
                0% {
                    -webkit-transform: scale(1);
                }

                50% {
                    opacity: 0.3;
                    -webkit-transform: scale(2);
                }

                100% {
                    -webkit-transform: scale(1);
                }
            }

            .mobirise-loader .amp-active>div {
                display: none;
            }

            .iconfont-wrapper {
                display: inline-block;
            }

            .mbr-flex {
                display: flex;
            }

            .flex-wrap {
                flex-wrap: wrap;
            }

            .mbr-jc-s {
                justify-content: flex-start;
            }

            .mbr-jc-c {
                justify-content: center;
            }

            .mbr-jc-e {
                justify-content: flex-end;
            }

            .mbr-row-reverse {
                flex-direction: row-reverse;
            }

            .mbr-column {
                flex-direction: column;
            }

            amp-img,
            img {
                height: 100%;
                width: 100%;
            }

            .hidden-slide {
                display: none;
            }

            .visible-slide {
                display: flex;
            }

            section,
            .container,
            .container-fluid {
                position: relative;
                word-wrap: break-word;
            }

            .mbr-fullscreen .mbr-overlay {
                min-height: 100vh;
            }

            .mbr-fullscreen {
                display: flex;
                align-items: center;
                height: 100vh;
                min-height: 100vh;
                padding: 3rem 0;
            }

            .container {
                padding: 0 2rem;
                width: 100%;
                margin-right: auto;
                margin-left: auto;
            }

            @media (max-width: 767px) {
                .container {
                    max-width: 100%;
                }
            }

            @media (min-width: 768px) {
                .container {
                    max-width: 100%;
                }
            }

            @media (min-width: 992px) {
                .container {
                    max-width: 100%;
                }
            }

            @media (min-width: 1200px) {
                .container {
                    max-width: 1400px;
                }
            }

            .container-fluid {
                width: 100%;
                padding: 0 2rem;
            }

            .container-fluid .img-col .img-wrapper {
                margin: 0 -1rem;
            }

            @media (max-width: 767px) {

                .container,
                .container-fluid {
                    padding: 0 1rem;
                }
            }

            .btn {
                position: relative;
                font-weight: 600;
                margin: 0.4rem 0.5rem;
                border: 2px solid;
                font-style: normal;
                white-space: normal;
                transition: all 0.3s ease-in-out, box-shadow 2s ease-in-out, -webkit-box-shadow 2s ease-in-out;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                word-break: break-word;
                line-height: 1;
                letter-spacing: 1px;
            }

            .btn-form {
                padding: 1rem 2rem;
            }

            .btn-form:hover {
                cursor: pointer;
            }

            .btn {
                padding: 1rem 2rem;
                border-radius: 0px;
            }

            .btn-sm {
                padding: 0.6rem 0.8rem;
                border-radius: 0px;
            }

            .btn-md {
                padding: 1rem 2rem;
                border-radius: 0px;
            }

            .btn-lg {
                padding: 1.4rem 3rem;
                border-radius: 0px;
            }

            form .btn,
            form .mbr-section-btn {
                margin: 0;
            }

            .note-popover .btn:after {
                display: none;
            }

            .mbr-section-btn {
                margin: 0 -0.5rem;
                font-size: 0;
            }

            nav .mbr-section-btn {
                margin-left: 0rem;
                margin-right: 0rem;
            }

            .btn .mbr-iconfont,
            .btn.btn-md .mbr-iconfont {
                cursor: pointer;
                margin: 0 0.8rem 0 0;
            }

            .btn-sm .mbr-iconfont {
                margin: 0 0.5rem 0 0;
            }

            [type="submit"] {
                -webkit-appearance: none;
            }

            section.menu {
                min-height: 80px;
            }

            .menu-container {
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                align-items: center;
                min-height: 50px;
            }

            @media (max-width: 991px) {
                .menu-container {
                    max-width: 100%;
                    padding: 0.5rem 1rem;
                }
            }

            @media (max-width: 767px) {
                .menu-container {
                    padding: 0.5rem 1rem;
                }
            }

            .navbar {
                z-index: 100;
                width: 100%;
            }

            .navbar-fixed-top {
                position: fixed;
                top: 0;
            }

            .navbar-brand {
                display: flex;
                align-items: center;
                word-break: break-word;
                z-index: 1;
            }

            .navbar-logo {
                margin: 0 0.8rem 0 0;
            }

            @media (max-width: 767px) {
                .navbar-logo amp-img {
                    max-height: 35px;
                    max-width: 35px;
                }
            }

            .navbar-caption-wrap {
                display: flex;
            }

            .navbar .navbar-collapse {
                display: flex;
                -ms-flex-preferred-size: auto;
                flex-basis: auto;
                align-items: center;
                justify-content: flex-end;
            }

            @media (max-width: 991px) {
                .navbar .navbar-collapse {
                    display: none;
                    position: absolute;
                    top: 0;
                    right: 0;
                    height: 100vh;
                    padding: 70px 2rem 1rem;
                    z-index: 1;
                }
            }

            @media (max-width: 991px) {

                .navbar.opened .navbar-collapse.show,
                .navbar.opened .navbar-collapse.collapsing {
                    display: block;
                }

                .is-builder .navbar-collapse {
                    position: fixed;
                }
            }

            .navbar-nav {
                list-style-type: none;
                display: flex;
                flex-wrap: wrap;
                padding-left: 0;
                min-width: 10rem;
            }

            @media (max-width: 991px) {
                .navbar-nav {
                    flex-direction: column;
                }
            }

            .navbar-nav .mbr-iconfont {
                margin: 0 0.2rem 0 0;
            }

            .nav-item {
                word-break: break-all;
            }

            .nav-link {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .nav-link,
            .navbar-caption {
                transition: all 0.2s;
                letter-spacing: 1px;
            }

            .nav-dropdown .dropdown-menu {
                min-width: 10rem;
                position: absolute;
                left: 0;
                padding: 1.25rem 0;
            }

            .nav-dropdown .dropdown-menu .dropdown-item {
                line-height: 2;
                display: flex;
                align-items: center;
                padding: 0.25rem 1.5rem;
                white-space: nowrap;
            }

            .nav-dropdown .dropdown-menu .dropdown {
                position: relative;
            }

            .dropdown-menu .dropdown:hover>.dropdown-menu {
                opacity: 1;
                pointer-events: all;
            }

            .nav-dropdown .dropdown-submenu {
                top: 0;
                left: 100%;
                margin: 0;
            }

            .nav-item.dropdown {
                position: relative;
            }

            .nav-item.dropdown .dropdown-menu {
                opacity: 0;
                pointer-events: none;
            }

            .nav-item.dropdown:hover>.dropdown-menu {
                opacity: 1;
                pointer-events: all;
            }

            .link.dropdown-toggle:after {
                content: "";
                margin-left: 0.25rem;
                border-top: 0.35em solid;
                border-right: 0.35em solid transparent;
                border-left: 0.35em solid transparent;
                border-bottom: 0;
            }

            .navbar .dropdown.open>.dropdown-menu {
                display: block;
            }

            @media (max-width: 991px) {
                .is-builder .nav-dropdown .dropdown-menu {
                    position: relative;
                }

                .nav-dropdown .dropdown-submenu {
                    left: 0;
                }

                .nav-dropdown .dropdown-menu .dropdown-item {
                    padding: 0.25rem 1.5rem;
                    margin: 0;
                }

                .nav-dropdown .dropdown-menu .dropdown-item:after {
                    right: auto;
                }

                .navbar.opened .dropdown-menu {
                    top: 0;
                }

                .dropdown-toggle[data-toggle="dropdown-submenu"]:after {
                    content: "";
                    margin-left: 0.25rem;
                    border-top: 0.35em solid;
                    border-right: 0.35em solid transparent;
                    border-left: 0.35em solid transparent;
                    border-bottom: 0;
                    top: 55%;
                }
            }

            .navbar-buttons {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
            }

            @media (max-width: 991px) {
                .navbar-buttons {
                    flex-direction: column;
                }
            }

            .menu-social-list {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
            }

            .menu-social-list a {
                margin: 0 0.5rem;
            }

            .menu-social-list a span {
                font-size: 1.5rem;
            }

            button.navbar-toggler {
                position: absolute;
                right: 20px;
                top: 30px;
                width: 31px;
                height: 20px;
                cursor: pointer;
                transition: all .2s;
                -ms-flex-item-align: center;
                -ms-grid-row-align: center;
                align-self: center;
            }

            .hamburger span {
                position: absolute;
                right: 0;
                width: 30px;
                height: 2px;
                border-right: 5px;
            }

            .hamburger span:nth-child(1) {
                top: 0;
                transition: all .2s;
            }

            .hamburger span:nth-child(2) {
                top: 8px;
                transition: all .15s;
            }

            .hamburger span:nth-child(3) {
                top: 8px;
                transition: all .15s;
            }

            .hamburger span:nth-child(4) {
                top: 16px;
                transition: all .2s;
            }

            nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(4),
            nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(1) {
                top: 8px;
                width: 0;
                opacity: 0;
                right: 50%;
                transition: all .2s;
            }

            nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(2) {
                transform: rotate(-45deg);
                transition: all .25s;
            }

            nav.opened .navbar-toggler:not(.hide) .hamburger span:nth-child(3) {
                transform: rotate(45deg);
                transition: all .25s;
            }

            .ampstart-btn.hamburger {
                position: absolute;
                top: 30px;
                right: 20px;
                margin-left: auto;
                height: 20px;
                width: 30px;
                background: none;
                border: none;
                cursor: pointer;
                z-index: 1000;
            }

            @media (min-width: 992px) {

                .ampstart-btn,
                amp-sidebar {
                    display: none;
                }

                .dropdown-menu .dropdown-toggle:after {
                    content: "";
                    border-bottom: 0.35em solid transparent;
                    border-left: 0.35em solid;
                    border-right: 0;
                    border-top: 0.35em solid transparent;
                    margin-left: 0.3rem;
                    margin-top: -0.3077em;
                    position: absolute;
                    right: 1.1538em;
                    top: 50%;
                }
            }

            .close-sidebar {
                width: 30px;
                height: 30px;
                position: relative;
                cursor: pointer;
                background-color: transparent;
                border: none;
            }

            .close-sidebar span {
                position: absolute;
                left: 0;
                width: 30px;
                height: 2px;
                border-right: 5px;
                top: 14px;
            }

            .close-sidebar span:nth-child(1) {
                transform: rotate(-45deg);
            }

            .close-sidebar span:nth-child(2) {
                transform: rotate(45deg);
            }

            .builder-sidebar {
                position: relative;
                height: 100vh;
                min-width: 10rem;
                z-index: 1030;
                padding: 1rem 2rem;
                max-width: 20rem;
            }

            .builder-sidebar .dropdown:hover>.dropdown-menu {
                position: relative;
                text-align: center;
            }

            section.sidebar-open:before {
                content: '';
                position: fixed;
                top: 0;
                bottom: 0;
                right: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.2);
                z-index: 1040;
            }

            .is-builder section.horizontal-menu .ampstart-btn {
                display: none;
            }

            .is-builder section.horizontal-menu .dropdown-menu {
                z-index: auto;
                opacity: 1;
                pointer-events: auto;
            }

            .is-builder .menu {
                overflow: visible;
            }

            #sidebar {
                background-color: transparent;
            }

            .card-title {
                margin: 0;
            }

            .card {
                position: relative;
                background-color: transparent;
                border: none;
                border-radius: 0;
                width: 100%;
                padding: 0 1rem;
            }

            @media (max-width: 767px) {
                .card:not(.last-child) {
                    padding-bottom: 30px;
                }
            }

            .card .card-img {
                width: auto;
                border-radius: 0;
            }

            .card .card-wrapper {
                height: 100%;
            }

            @media (max-width: 767px) {
                .card .card-wrapper {
                    flex-direction: column;
                }
            }

            .card img {
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: center;
                object-position: center;
            }

            .card-inner,
            .items-list {
                display: flex;
                flex-direction: column;
            }

            .items-list {
                list-style-type: none;
                padding: 0;
            }

            .items-list .list-item {
                padding: 1rem 2rem;
            }

            .card-head {
                padding: 1.5rem 2rem;
            }

            .card-price-wrap {
                padding: 1rem 2rem;
            }

            .card-button {
                padding: 1rem;
                margin: 0;
            }

            .timeline-wrap {
                position: relative;
            }

            .timeline-wrap .iconBackground {
                position: absolute;
                left: 50%;
                width: 20px;
                height: 20px;
                line-height: 30px;
                text-align: center;
                border-radius: 50%;
                font-size: 30px;
                display: inline-block;
                background-color: #000000;
                top: 20px;
                margin: 0 0 0 -10px;
            }

            @media (max-width: 767px) {
                .timeline-wrap .iconBackground {
                    left: 0;
                }
            }

            .separline {
                position: relative;
            }

            @media (max-width: 767px) {
                .separline:not(.last-child) {
                    padding-bottom: 2rem;
                }
            }

            .separline:before {
                position: absolute;
                content: "";
                width: 2px;
                background-color: #000000;
                left: calc(50% - 1px);
                height: calc(100% - 20px);
                top: 40px;
            }

            @media (max-width: 767px) {
                .separline:before {
                    left: 0;
                }
            }

            .gallery-img-wrap {
                position: relative;
                height: 100%;
            }

            .gallery-img-wrap:hover {
                cursor: pointer;
            }

            .gallery-img-wrap:hover .icon-wrap,
            .gallery-img-wrap:hover .caption-on-hover {
                opacity: 1;
            }

            .gallery-img-wrap:hover:after {
                opacity: .5;
            }

            .gallery-img-wrap amp-img {
                height: 100%;
            }

            .gallery-img-wrap:after {
                content: "";
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: #000;
                opacity: 0;
                transition: opacity 0.2s;
                pointer-events: none;
            }

            .gallery-img-wrap .icon-wrap,
            .gallery-img-wrap .img-caption {
                z-index: 3;
                pointer-events: none;
                position: absolute;
            }

            .gallery-img-wrap .icon-wrap,
            .gallery-img-wrap .caption-on-hover {
                opacity: 0;
                transition: opacity 0.2s;
            }

            .gallery-img-wrap .icon-wrap {
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #fff;
                padding: .5rem;
                border-radius: 50%;
            }

            .gallery-img-wrap .amp-iconfont {
                color: #000;
                font-size: 1rem;
                width: 1rem;
                display: block;
            }

            .gallery-img-wrap .img-caption {
                left: 0;
                right: 0;
            }

            .gallery-img-wrap .img-caption.caption-top {
                top: 0;
            }

            .gallery-img-wrap .img-caption.caption-bottom {
                bottom: 0;
            }

            .gallery-img-wrap .img-caption:not(.caption-on-hover):after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 100%;
                transition: opacity 0.2s;
                z-index: -1;
                pointer-events: none;
            }

            @media (max-width: 767px) {

                .gallery-img-wrap:after,
                .gallery-img-wrap:hover:after,
                .gallery-img-wrap .icon-wrap {
                    display: none;
                }

                .gallery-img-wrap .caption-on-hover {
                    opacity: 1;
                }
            }

            .is-builder .gallery-img-wrap .icon-wrap,
            .is-builder .gallery-img-wrap .img-caption>* {
                pointer-events: all;
            }

            .amp-carousel-button,
            .dots-wrapper .dots span {
                transition: all 0.4s;
                cursor: pointer;
                outline: none;
            }

            .amp-carousel-button {
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }

            .dots-wrapper .dots {
                display: inline-block;
                margin: 4px 8px;
            }

            .dots-wrapper .dots span {
                display: block;
                border-radius: 12px;
                height: 24px;
                width: 24px;
                background-color: #ffffff;
                border: 10px solid #cccccc;
                opacity: 0.5;
            }

            .dots-wrapper .dots span.current {
                width: 40px;
            }

            .dots-wrapper .dots span:hover,
            .dots-wrapper .dots span.current {
                opacity: 1;
            }

            .amp-carousel-button-next:after {
                right: 1rem;
            }

            .amp-carousel-button-prev:after {
                left: 1rem;
            }

            button.btn-img {
                cursor: pointer;
            }

            .is-builder .preview button.btn-img {
                opacity: 0.5;
                position: relative;
                pointer-events: none;
            }

            amp-image-lightbox,
            .lightbox {
                background: rgba(0, 0, 0, 0.8);
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100%;
                overflow: auto;
            }

            amp-image-lightbox a.control,
            .lightbox a.control {
                position: absolute;
                cursor: default;
                top: 0;
                right: 0;
            }

            amp-image-lightbox .close,
            .lightbox .close {
                background: none;
                border: none;
                position: absolute;
                top: 16px;
                right: 16px;
                height: 32px;
                width: 32px;
                cursor: pointer;
                z-index: 1000;
            }

            amp-image-lightbox .close:before,
            amp-image-lightbox .close:after,
            .lightbox .close:before,
            .lightbox .close:after {
                position: absolute;
                top: 0;
                right: 16px;
                content: ' ';
                height: 32px;
                width: 2px;
                background-color: #fff;
            }

            amp-image-lightbox .close:before,
            .lightbox .close:before {
                transform: rotate(45deg);
            }

            amp-image-lightbox .close:after,
            .lightbox .close:after {
                transform: rotate(-45deg);
            }

            amp-image-lightbox .video-block,
            .lightbox .video-block {
                width: 100%;
            }

            div[submit-success]>*,
            div[submit-error]>* {
                padding: 15px;
                margin-bottom: 1rem;
            }

            .form-block {
                z-index: 1;
                background-color: transparent;
                padding: 30px;
                position: relative;
                overflow: hidden;
            }

            .form-block .mbr-overlay {
                z-index: -1;
            }

            @media (max-width: 991px) {
                .form-block {
                    padding: 15px;
                }
            }

            form input,
            form textarea,
            form select {
                padding: 15px 0.5rem;
                line-height: 1.45;
                width: 100%;
                background: #ffffff;
                border-width: 1px;
                border-style: solid;
                border-color: #767676;
                border-radius: 0;
                color: #000000;
            }

            form input[type="checkbox"],
            form input[type="radio"] {
                border: none;
                background: none;
                width: auto;
            }

            form .field {
                padding-bottom: 0.5rem;
                padding-top: 0.5rem;
            }

            form textarea.field-input {
                height: 200px;
            }

            form .fieldset {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                align-items: center;
            }

            textarea[type="hidden"] {
                display: none;
            }

            .form-check {
                margin-bottom: 0;
            }

            .form-check-label {
                padding-left: 0;
            }

            .form-check-input {
                position: relative;
                margin: 4px;
            }

            .form-check-inline {
                display: inline-flex;
                align-items: center;
                padding-left: 0;
                margin-right: .75rem;
            }

            .mbr-row,
            .mbr-form-row {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-left: -1rem;
                margin-right: -1rem;
            }

            .mbr-form-row {
                margin-left: -0.5rem;
                margin-right: -0.5rem;
            }

            .mbr-form-row>[class*="mbr-col"] {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            @media (max-width: 767px) {

                .mbr-col,
                .mbr-col-auto {
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-sm-12 {
                    -ms-flex: 0 0 100%;
                    -webkit-box-flex: 0;
                    flex: 0 0 100%;
                    max-width: 100%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }
            }

            @media (min-width: 768px) {

                .mbr-col,
                .mbr-col-auto {
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-2 {
                    -ms-flex: 0 0 16.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 16.6666666667%;
                    max-width: 16.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-3 {
                    -ms-flex: 0 0 25%;
                    -webkit-box-flex: 0;
                    flex: 0 0 25%;
                    max-width: 25%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-4 {
                    -ms-flex: 0 0 33.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 33.3333333333%;
                    max-width: 33.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-5 {
                    -ms-flex: 0 0 41.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 41.6666666667%;
                    max-width: 41.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-6 {
                    -ms-flex: 0 0 50%;
                    -webkit-box-flex: 0;
                    flex: 0 0 50%;
                    max-width: 50%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-7 {
                    -ms-flex: 0 0 58.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 58.3333333333%;
                    max-width: 58.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-8 {
                    -ms-flex: 0 0 66.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 66.6666666667%;
                    max-width: 66.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-10 {
                    -ms-flex: 0 0 83.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 83.3333333333%;
                    max-width: 83.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-md-12 {
                    -ms-flex: 0 0 100%;
                    -webkit-box-flex: 0;
                    flex: 0 0 100%;
                    max-width: 100%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }
            }

            .mbr-col {
                -ms-flex: 1 1 auto;
                -webkit-box-flex: 1;
                flex: 1 1 auto;
                max-width: 100%;
            }

            .mbr-col-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
            }

            @media (min-width: 992px) {

                .mbr-col,
                .mbr-col-auto {
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-2 {
                    -ms-flex: 0 0 16.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 16.6666666667%;
                    max-width: 16.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-3 {
                    -ms-flex: 0 0 25%;
                    -webkit-box-flex: 0;
                    flex: 0 0 25%;
                    max-width: 25%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-4 {
                    -ms-flex: 0 0 33.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 33.3333333333%;
                    max-width: 33.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-5 {
                    -ms-flex: 0 0 41.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 41.6666666667%;
                    max-width: 41.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-6 {
                    -ms-flex: 0 0 50%;
                    -webkit-box-flex: 0;
                    flex: 0 0 50%;
                    max-width: 50%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-7 {
                    -ms-flex: 0 0 58.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 58.3333333333%;
                    max-width: 58.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-8 {
                    -ms-flex: 0 0 66.6666666667%;
                    -webkit-box-flex: 0;
                    flex: 0 0 66.6666666667%;
                    max-width: 66.6666666667%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-9 {
                    -ms-flex: 0 0 75%;
                    -webkit-box-flex: 0;
                    flex: 0 0 75%;
                    max-width: 75%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-10 {
                    -ms-flex: 0 0 83.3333333333%;
                    -webkit-box-flex: 0;
                    flex: 0 0 83.3333333333%;
                    max-width: 83.3333333333%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }

                .mbr-col-lg-12 {
                    -ms-flex: 0 0 100%;
                    -webkit-box-flex: 0;
                    flex: 0 0 100%;
                    max-width: 100%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }
            }

            @media (min-width: 992px) {
                .lg-pb {
                    padding-bottom: 3rem;
                }
            }

            @media (max-width: 991px) {
                .md-pb {
                    padding-bottom: 3rem;
                }
            }

            .mbr-pt-1,
            .mbr-py-1 {
                padding-top: 10px;
            }

            .mbr-pb-1,
            .mbr-py-1 {
                padding-bottom: 10px;
            }

            .mbr-px-1 {
                padding-left: 10px;
                padding-right: 10px;
            }

            .mbr-p-1 {
                padding: 10px;
            }

            .mbr-pt-2,
            .mbr-py-2 {
                padding-top: 1rem;
            }

            .mbr-pb-2,
            .mbr-py-2 {
                padding-bottom: 1rem;
            }

            .mbr-px-2 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .mbr-p-2 {
                padding: 1rem;
            }

            .mbr-pt-3,
            .mbr-py-3 {
                padding-top: 25px;
            }

            .mbr-pb-3,
            .mbr-py-3 {
                padding-bottom: 25px;
            }

            .mbr-px-3 {
                padding-left: 25px;
                padding-right: 25px;
            }

            .mbr-p-3 {
                padding: 25px;
            }

            .mbr-pt-4,
            .mbr-py-4 {
                padding-top: 2rem;
            }

            .mbr-pb-4,
            .mbr-py-4 {
                padding-bottom: 2rem;
            }

            .mbr-px-4 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .mbr-p-4 {
                padding: 2rem;
            }

            .mbr-pt-5,
            .mbr-py-5 {
                padding-top: 3rem;
            }

            .mbr-pb-5,
            .mbr-py-5 {
                padding-bottom: 3rem;
            }

            .mbr-px-5 {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .mbr-p-5 {
                padding: 3rem;
            }

            @media (max-width: 991px) {

                .mbr-py-4,
                .mbr-py-5 {
                    padding-top: 1rem;
                    padding-bottom: 1rem;
                }

                .mbr-px-4,
                .mbr-px-5 {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }

                .mbr-p-3,
                .mbr-p-4,
                .mbr-p-5 {
                    padding: 1rem;
                }
            }

            .mbr-ml-auto {
                margin-left: auto;
            }

            .mbr-mr-auto {
                margin-right: auto;
            }

            .mbr-m-auto {
                margin: auto;
            }

            #scrollToTopMarker {
                position: absolute;
                width: 0px;
                height: 0px;
                top: 300px;
            }

            #scrollToTopButton {
                position: fixed;
                bottom: 25px;
                right: 25px;
                opacity: .4;
                z-index: 5000;
                font-size: 32px;
                height: 60px;
                width: 60px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            #scrollToTopButton:focus {
                outline: none;
            }

            #scrollToTopButton a:before {
                content: '';
                position: absolute;
                height: 40%;
                top: 36%;
                width: 2px;
                left: calc(50% - 1px);
            }

            #scrollToTopButton a:after {
                content: '';
                position: absolute;
                border-top: 2px solid;
                border-right: 2px solid;
                width: 40%;
                height: 40%;
                left: calc(30% - 1px);
                bottom: 30%;
                transform: rotate(-45deg);
            }

            .is-builder #scrollToTopButton a:after {
                left: 30%;
            }

            a {
                font-style: normal;
                font-weight: 400;
            }

            @media (max-width: 767px) {

                .mbr-section-btn,
                .mbr-section-title {
                    text-align: center;
                }
            }

            body {
                font-family: Manrope;
            }

            blockquote {
                border-color: #6d7a71;
            }

            div[submit-success]>* {
                background: #000000;
                color: #ffffff;
            }

            div[submit-error]>* {
                background: #f5f5f5;
                color: #000000;
            }

            .display-1 {
                font-family: 'Manrope', sans-serif;
                font-size: 5rem;
            }

            .display-2 {
                font-family: 'Manrope', sans-serif;
                font-size: 3.8rem;
            }

            .display-4 {
                font-family: 'Manrope', sans-serif;
                font-size: 1rem;
            }

            .display-5 {
                font-family: 'Manrope', sans-serif;
                font-size: 1.6rem;
            }

            .display-7 {
                font-family: 'Manrope', sans-serif;
                font-size: 1.2rem;
            }

            .display-1 .mbr-iconfont-btn {
                font-size: 5rem;
                width: 5rem;
            }

            .display-2 .mbr-iconfont-btn {
                font-size: 3.8rem;
                width: 3.8rem;
            }

            .display-4 .mbr-iconfont-btn {
                font-size: 1.2rem;
                width: 1.2rem;
            }

            .display-5 .mbr-iconfont-btn {
                font-size: 1.6rem;
                width: 1.6rem;
            }

            .display-7 .mbr-iconfont-btn {
                font-size: 1.2rem;
                width: 1.2rem;
            }

            @media (max-width: 768px) {
                .display-1 {
                    font-size: 4rem;
                    font-size: calc(2.4rem + (5 - 2.4) * ((100vw - 20rem) / (48 - 20)));
                    line-height: calc(1.4 * (2.4rem + (5 - 2.4) * ((100vw - 20rem) / (48 - 20))));
                }

                .display-2 {
                    font-size: 3.04rem;
                    font-size: calc(1.98rem + (3.8 - 1.98) * ((100vw - 20rem) / (48 - 20)));
                    line-height: calc(1.4 * (1.98rem + (3.8 - 1.98) * ((100vw - 20rem) / (48 - 20))));
                }

                .display-4 {
                    font-size: 0.8rem;
                    font-size: calc(1rem + (1 - 1) * ((100vw - 20rem) / (48 - 20)));
                    line-height: calc(1.4 * (1rem + (1 - 1) * ((100vw - 20rem) / (48 - 20))));
                }

                .display-5 {
                    font-size: 1.28rem;
                    font-size: calc(1.21rem + (1.6 - 1.21) * ((100vw - 20rem) / (48 - 20)));
                    line-height: calc(1.4 * (1.21rem + (1.6 - 1.21) * ((100vw - 20rem) / (48 - 20))));
                }
            }

            .bg-primary {
                background-color: #6d7a71;
            }

            .bg-success {
                background-color: #000000;
            }

            .bg-info {
                background-color: #757575;
            }

            .bg-warning {
                background-color: #767676;
            }

            .bg-danger {
                background-color: #f5f5f5;
            }

            .btn-primary {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-primary,
            .btn-primary:active,
            .btn-primary.active {
                background-color: #6d7a71;
                border-color: #6d7a71;
                color: #ffffff;
            }

            .btn-primary:hover,
            .btn-primary:focus,
            .btn-primary.focus {
                color: #ffffff;
                background-color: #616d65;
                border-color: #616d65;
            }

            .btn-primary.disabled,
            .btn-primary:disabled {
                color: #ffffff;
                background-color: #616d65;
                border-color: #616d65;
            }

            .btn-primary:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #6d7a71;
                transform-origin: top;
                z-index: -1;
            }

            .btn-primary:hover,
            .btn-primary:active,
            .btn-primary:focus {
                color: #6d7a71;
                background: transparent;
            }

            .btn-primary:hover:before,
            .btn-primary:active:before,
            .btn-primary:focus:before {
                transform: scaleY(0);
            }

            .btn-secondary {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-secondary,
            .btn-secondary:active,
            .btn-secondary.active {
                background-color: #4a4a4a;
                border-color: #4a4a4a;
                color: #ffffff;
            }

            .btn-secondary:hover,
            .btn-secondary:focus,
            .btn-secondary.focus {
                color: #ffffff;
                background-color: #3d3d3d;
                border-color: #3d3d3d;
            }

            .btn-secondary.disabled,
            .btn-secondary:disabled {
                color: #ffffff;
                background-color: #3d3d3d;
                border-color: #3d3d3d;
            }

            .btn-secondary:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #4a4a4a;
                transform-origin: top;
                z-index: -1;
            }

            .btn-secondary:hover,
            .btn-secondary:active,
            .btn-secondary:focus {
                color: #4a4a4a;
                background: transparent;
            }

            .btn-secondary:hover:before,
            .btn-secondary:active:before,
            .btn-secondary:focus:before {
                transform: scaleY(0);
            }

            .btn-info {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-info,
            .btn-info:active,
            .btn-info.active {
                background-color: #757575;
                border-color: #757575;
                color: #ffffff;
            }

            .btn-info:hover,
            .btn-info:focus,
            .btn-info.focus {
                color: #ffffff;
                background-color: #686868;
                border-color: #686868;
            }

            .btn-info.disabled,
            .btn-info:disabled {
                color: #ffffff;
                background-color: #686868;
                border-color: #686868;
            }

            .btn-info:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #757575;
                transform-origin: top;
                z-index: -1;
            }

            .btn-info:hover,
            .btn-info:active,
            .btn-info:focus {
                color: #757575;
                background: transparent;
            }

            .btn-info:hover:before,
            .btn-info:active:before,
            .btn-info:focus:before {
                transform: scaleY(0);
            }

            .btn-success {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-success,
            .btn-success:active,
            .btn-success.active {
                background-color: #000000;
                border-color: #000000;
                color: #ffffff;
            }

            .btn-success:hover,
            .btn-success:focus,
            .btn-success.focus {
                color: #ffffff;
                background-color: #000000;
                border-color: #000000;
            }

            .btn-success.disabled,
            .btn-success:disabled {
                color: #ffffff;
                background-color: #000000;
                border-color: #000000;
            }

            .btn-success:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #000000;
                transform-origin: top;
                z-index: -1;
            }

            .btn-success:hover,
            .btn-success:active,
            .btn-success:focus {
                color: #000000;
                background: transparent;
            }

            .btn-success:hover:before,
            .btn-success:active:before,
            .btn-success:focus:before {
                transform: scaleY(0);
            }

            .btn-warning {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-warning,
            .btn-warning:active,
            .btn-warning.active {
                background-color: #767676;
                border-color: #767676;
                color: #ffffff;
            }

            .btn-warning:hover,
            .btn-warning:focus,
            .btn-warning.focus {
                color: #ffffff;
                background-color: #696969;
                border-color: #696969;
            }

            .btn-warning.disabled,
            .btn-warning:disabled {
                color: #ffffff;
                background-color: #696969;
                border-color: #696969;
            }

            .btn-warning:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #767676;
                transform-origin: top;
                z-index: -1;
            }

            .btn-warning:hover,
            .btn-warning:active,
            .btn-warning:focus {
                color: #767676;
                background: transparent;
            }

            .btn-warning:hover:before,
            .btn-warning:active:before,
            .btn-warning:focus:before {
                transform: scaleY(0);
            }

            .btn-danger {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-danger,
            .btn-danger:active,
            .btn-danger.active {
                background-color: #f5f5f5;
                border-color: #f5f5f5;
                color: #767676;
            }

            .btn-danger:hover,
            .btn-danger:focus,
            .btn-danger.focus {
                color: #767676;
                background-color: #e8e8e8;
                border-color: #e8e8e8;
            }

            .btn-danger.disabled,
            .btn-danger:disabled {
                color: #767676;
                background-color: #e8e8e8;
                border-color: #e8e8e8;
            }

            .btn-danger:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #f5f5f5;
                transform-origin: top;
                z-index: -1;
            }

            .btn-danger:hover,
            .btn-danger:active,
            .btn-danger:focus {
                color: #f5f5f5;
                background: transparent;
            }

            .btn-danger:hover:before,
            .btn-danger:active:before,
            .btn-danger:focus:before {
                transform: scaleY(0);
            }

            .btn-black {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-black,
            .btn-black:active,
            .btn-black.active {
                background-color: #333333;
                border-color: #333333;
                color: #ffffff;
            }

            .btn-black:hover,
            .btn-black:focus,
            .btn-black.focus {
                color: #ffffff;
                background-color: #262626;
                border-color: #262626;
            }

            .btn-black.disabled,
            .btn-black:disabled {
                color: #ffffff;
                background-color: #262626;
                border-color: #262626;
            }

            .btn-black:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #333333;
                transform-origin: top;
                z-index: -1;
            }

            .btn-black:hover,
            .btn-black:active,
            .btn-black:focus {
                color: #333333;
                background: transparent;
            }

            .btn-black:hover:before,
            .btn-black:active:before,
            .btn-black:focus:before {
                transform: scaleY(0);
            }

            .btn-white {
                position: relative;
                background: transparent;
                z-index: 1;
            }

            .btn-white,
            .btn-white:active,
            .btn-white.active {
                background-color: #ffffff;
                border-color: #ffffff;
                color: #808080;
            }

            .btn-white:hover,
            .btn-white:focus,
            .btn-white.focus {
                color: #808080;
                background-color: #f2f2f2;
                border-color: #f2f2f2;
            }

            .btn-white.disabled,
            .btn-white:disabled {
                color: #808080;
                background-color: #f2f2f2;
                border-color: #f2f2f2;
            }

            .btn-white:before {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                transition: all 0.3s;
                content: '';
                background: #ffffff;
                transform-origin: top;
                z-index: -1;
            }

            .btn-white:hover,
            .btn-white:active,
            .btn-white:focus {
                color: #ffffff;
                background: transparent;
            }

            .btn-white:hover:before,
            .btn-white:active:before,
            .btn-white:focus:before {
                transform: scaleY(0);
            }

            .btn-white,
            .btn-white:active,
            .btn-white.active {
                color: #6d7a71;
            }

            .btn-white:hover,
            .btn-white:focus,
            .btn-white.focus {
                color: #6d7a71;
            }

            .btn-white.disabled,
            .btn-white:disabled {
                color: #6d7a71;
            }

            .btn-primary-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-primary-outline,
            .btn-primary-outline:active,
            .btn-primary-outline.active {
                background: none;
                border-color: #6d7a71;
                color: #6d7a71;
            }

            .btn-primary-outline:hover,
            .btn-primary-outline:focus,
            .btn-primary-outline.focus {
                color: #ffffff;
                background-color: #6d7a71;
                border-color: #6d7a71;
            }

            .btn-primary-outline.disabled,
            .btn-primary-outline:disabled {
                color: #ffffff;
                background-color: #6d7a71;
                border-color: #6d7a71;
            }

            .btn-primary-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-primary-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #6d7a71;
                right: 0;
            }

            .btn-primary-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #6d7a71;
                left: 0;
            }

            .btn-primary-outline:hover {
                padding-left: 6px;
            }

            .btn-primary-outline:hover:before {
                width: 0%;
            }

            .btn-primary-outline:hover:after {
                width: 100%;
            }

            .btn-primary-outline:hover,
            .btn-primary-outline:active,
            .btn-primary-outline:focus {
                background: transparent;
                color: #6d7a71;
            }

            .btn-secondary-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-secondary-outline,
            .btn-secondary-outline:active,
            .btn-secondary-outline.active {
                background: none;
                border-color: #4a4a4a;
                color: #4a4a4a;
            }

            .btn-secondary-outline:hover,
            .btn-secondary-outline:focus,
            .btn-secondary-outline.focus {
                color: #ffffff;
                background-color: #4a4a4a;
                border-color: #4a4a4a;
            }

            .btn-secondary-outline.disabled,
            .btn-secondary-outline:disabled {
                color: #ffffff;
                background-color: #4a4a4a;
                border-color: #4a4a4a;
            }

            .btn-secondary-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-secondary-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #4a4a4a;
                right: 0;
            }

            .btn-secondary-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #4a4a4a;
                left: 0;
            }

            .btn-secondary-outline:hover {
                padding-left: 6px;
            }

            .btn-secondary-outline:hover:before {
                width: 0%;
            }

            .btn-secondary-outline:hover:after {
                width: 100%;
            }

            .btn-secondary-outline:hover,
            .btn-secondary-outline:active,
            .btn-secondary-outline:focus {
                background: transparent;
                color: #4a4a4a;
            }

            .btn-info-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-info-outline,
            .btn-info-outline:active,
            .btn-info-outline.active {
                background: none;
                border-color: #757575;
                color: #757575;
            }

            .btn-info-outline:hover,
            .btn-info-outline:focus,
            .btn-info-outline.focus {
                color: #ffffff;
                background-color: #757575;
                border-color: #757575;
            }

            .btn-info-outline.disabled,
            .btn-info-outline:disabled {
                color: #ffffff;
                background-color: #757575;
                border-color: #757575;
            }

            .btn-info-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-info-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #757575;
                right: 0;
            }

            .btn-info-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #757575;
                left: 0;
            }

            .btn-info-outline:hover {
                padding-left: 6px;
            }

            .btn-info-outline:hover:before {
                width: 0%;
            }

            .btn-info-outline:hover:after {
                width: 100%;
            }

            .btn-info-outline:hover,
            .btn-info-outline:active,
            .btn-info-outline:focus {
                background: transparent;
                color: #757575;
            }

            .btn-success-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-success-outline,
            .btn-success-outline:active,
            .btn-success-outline.active {
                background: none;
                border-color: #000000;
                color: #000000;
            }

            .btn-success-outline:hover,
            .btn-success-outline:focus,
            .btn-success-outline.focus {
                color: #ffffff;
                background-color: #000000;
                border-color: #000000;
            }

            .btn-success-outline.disabled,
            .btn-success-outline:disabled {
                color: #ffffff;
                background-color: #000000;
                border-color: #000000;
            }

            .btn-success-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-success-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #000000;
                right: 0;
            }

            .btn-success-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #000000;
                left: 0;
            }

            .btn-success-outline:hover {
                padding-left: 6px;
            }

            .btn-success-outline:hover:before {
                width: 0%;
            }

            .btn-success-outline:hover:after {
                width: 100%;
            }

            .btn-success-outline:hover,
            .btn-success-outline:active,
            .btn-success-outline:focus {
                background: transparent;
                color: #000000;
            }

            .btn-warning-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-warning-outline,
            .btn-warning-outline:active,
            .btn-warning-outline.active {
                background: none;
                border-color: #767676;
                color: #767676;
            }

            .btn-warning-outline:hover,
            .btn-warning-outline:focus,
            .btn-warning-outline.focus {
                color: #ffffff;
                background-color: #767676;
                border-color: #767676;
            }

            .btn-warning-outline.disabled,
            .btn-warning-outline:disabled {
                color: #ffffff;
                background-color: #767676;
                border-color: #767676;
            }

            .btn-warning-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-warning-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #767676;
                right: 0;
            }

            .btn-warning-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #767676;
                left: 0;
            }

            .btn-warning-outline:hover {
                padding-left: 6px;
            }

            .btn-warning-outline:hover:before {
                width: 0%;
            }

            .btn-warning-outline:hover:after {
                width: 100%;
            }

            .btn-warning-outline:hover,
            .btn-warning-outline:active,
            .btn-warning-outline:focus {
                background: transparent;
                color: #767676;
            }

            .btn-danger-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-danger-outline,
            .btn-danger-outline:active,
            .btn-danger-outline.active {
                background: none;
                border-color: #f5f5f5;
                color: #f5f5f5;
            }

            .btn-danger-outline:hover,
            .btn-danger-outline:focus,
            .btn-danger-outline.focus {
                color: #767676;
                background-color: #f5f5f5;
                border-color: #f5f5f5;
            }

            .btn-danger-outline.disabled,
            .btn-danger-outline:disabled {
                color: #767676;
                background-color: #f5f5f5;
                border-color: #f5f5f5;
            }

            .btn-danger-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-danger-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #f5f5f5;
                right: 0;
            }

            .btn-danger-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #f5f5f5;
                left: 0;
            }

            .btn-danger-outline:hover {
                padding-left: 6px;
            }

            .btn-danger-outline:hover:before {
                width: 0%;
            }

            .btn-danger-outline:hover:after {
                width: 100%;
            }

            .btn-danger-outline:hover,
            .btn-danger-outline:active,
            .btn-danger-outline:focus {
                background: transparent;
                color: #f5f5f5;
            }

            .btn-black-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-black-outline,
            .btn-black-outline:active,
            .btn-black-outline.active {
                background: none;
                border-color: #333333;
                color: #333333;
            }

            .btn-black-outline:hover,
            .btn-black-outline:focus,
            .btn-black-outline.focus {
                color: #ffffff;
                background-color: #333333;
                border-color: #333333;
            }

            .btn-black-outline.disabled,
            .btn-black-outline:disabled {
                color: #ffffff;
                background-color: #333333;
                border-color: #333333;
            }

            .btn-black-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-black-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: #333333;
                right: 0;
            }

            .btn-black-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: #333333;
                left: 0;
            }

            .btn-black-outline:hover {
                padding-left: 6px;
            }

            .btn-black-outline:hover:before {
                width: 0%;
            }

            .btn-black-outline:hover:after {
                width: 100%;
            }

            .btn-black-outline:hover,
            .btn-black-outline:active,
            .btn-black-outline:focus {
                background: transparent;
                color: #333333;
            }

            .btn-white-outline,
            .btn-white-outline:active,
            .btn-white-outline.active {
                background: none;
                border-color: #ffffff;
                color: #ffffff;
            }

            .btn-white-outline:hover,
            .btn-white-outline:focus,
            .btn-white-outline.focus {
                color: #333333;
                background-color: #ffffff;
                border-color: #ffffff;
            }

            .text-primary {
                color: #6d7a71;
            }

            .text-secondary {
                color: #4a4a4a;
            }

            .text-success {
                color: #000000;
            }

            .text-info {
                color: #757575;
            }

            .text-warning {
                color: #767676;
            }

            .text-danger {
                color: #f5f5f5;
            }

            .text-white {
                color: #ffffff;
            }

            .text-black {
                color: #000000;
            }

            a.text-primary:hover,
            a.text-primary:focus {
                color: #3d443f;
            }

            a.text-secondary:hover,
            a.text-secondary:focus {
                color: #171717;
            }

            a.text-success:hover,
            a.text-success:focus {
                color: #000000;
            }

            a.text-info:hover,
            a.text-info:focus {
                color: #424242;
            }

            a.text-warning:hover,
            a.text-warning:focus {
                color: #434343;
            }

            a.text-danger:hover,
            a.text-danger:focus {
                color: #c2c2c2;
            }

            a.text-white:hover,
            a.text-white:focus {
                color: #b3b3b3;
            }

            a.text-black:hover,
            a.text-black:focus {
                color: #4d4d4d;
            }

            .alert-success {
                background-color: #000000;
            }

            .alert-info {
                background-color: #757575;
            }

            .alert-warning {
                background-color: #767676;
            }

            .alert-danger {
                background-color: #f5f5f5;
            }

            a,
            a:hover {
                color: #6d7a71;
            }

            .mbr-plan-header.bg-primary .mbr-plan-subtitle,
            .mbr-plan-header.bg-primary .mbr-plan-price-desc {
                color: #afb8b2;
            }

            .mbr-plan-header.bg-success .mbr-plan-subtitle,
            .mbr-plan-header.bg-success .mbr-plan-price-desc {
                color: #b3b3b3;
            }

            .mbr-plan-header.bg-info .mbr-plan-subtitle,
            .mbr-plan-header.bg-info .mbr-plan-price-desc {
                color: #b5b5b5;
            }

            .mbr-plan-header.bg-warning .mbr-plan-subtitle,
            .mbr-plan-header.bg-warning .mbr-plan-price-desc {
                color: #b6b6b6;
            }

            .mbr-plan-header.bg-danger .mbr-plan-subtitle,
            .mbr-plan-header.bg-danger .mbr-plan-price-desc {
                color: #ffffff;
            }

            .mobirise-spinner em:nth-child(1) {
                background: #6d7a71;
            }

            .mobirise-spinner em:nth-child(2) {
                background: #4a4a4a;
            }

            .mobirise-spinner em:nth-child(3) {
                background: #000000;
            }

            #scrollToTopMarker {
                display: none;
            }

            #scrollToTopButton {
                background-color: #6d7a71;
            }

            #scrollToTopButton a:before {
                background: contrast(#6d7a71);
            }

            #scrollToTopButton a:after {
                border-top-color: contrast(#6d7a71);
                border-right-color: contrast(#6d7a71);
            }

            .btn-black {
                background: transparent;
            }

            .btn-white-outline {
                border: none;
                position: relative;
                padding: 1rem 0;
                min-width: 220px;
                width: fit-content;
                justify-content: space-between;
            }

            .btn-white-outline .mbr-iconfont {
                order: 2;
                padding: 0;
                margin: 0rem 0rem 0rem 1rem;
            }

            .btn-white-outline:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                transition: all 0.3s;
                bottom: 0;
                background: white;
                right: 0;
            }

            .btn-white-outline:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                bottom: 0;
                transition: all 0.3s;
                transition-delay: 0.2s;
                background: white;
                left: 0;
            }

            .btn-white-outline:hover {
                padding-left: 6px;
            }

            .btn-white-outline:hover:before {
                width: 0%;
            }

            .btn-white-outline:hover:after {
                width: 100%;
            }

            .btn-white-outline:hover,
            .btn-white-outline:active,
            .btn-white-outline:focus {
                background: transparent;
                color: white;
            }

            .cid-s0bsbJEbVa {
                background-color: #ffffff;
                overflow: visible;
            }

            .cid-s0bsbJEbVa .navbar {
                background: #ffffff;
                z-index: 1000;
                padding: 0 1rem;
                height: 80px;
            }

            .cid-s0bsbJEbVa .menu-container {
                min-height: 100%;
            }

            .cid-s0bsbJEbVa .navbar-caption {
                line-height: inherit;
            }

            @media (max-width: 991px) {
                .cid-s0bsbJEbVa .navbar .navbar-collapse {
                    background: #ffffff;
                }
            }

            .cid-s0bsbJEbVa .nav-link {
                margin: .667em 1em;
                padding: 0;
            }

            .cid-s0bsbJEbVa .dropdown-menu {
                background: #ffffff;
            }

            .cid-s0bsbJEbVa .dropdown-item {
                position: relative;
            }

            .cid-s0bsbJEbVa .dropdown-item:before {
                content: "";
                position: absolute;
                left: -15px;
                top: 50%;
                transform: translateY(-50%) rotate(45deg);
                opacity: 0;
                margin-right: 15px;
                width: 5px;
                height: 5px;
            }

            .cid-s0bsbJEbVa .dropdown-item,
            .cid-s0bsbJEbVa .dropdown-item:before {
                transition: all .3s;
            }

            .cid-s0bsbJEbVa .dropdown-item {
                justify-content: flex-start;
            }

            .cid-s0bsbJEbVa .dropdown-item:active,
            .cid-s0bsbJEbVa .dropdown-item:focus,
            .cid-s0bsbJEbVa .dropdown-item:hover {
                background: #ffffff;
                color: currentColor;
            }

            .cid-s0bsbJEbVa .hamburger span {
                background-color: #000000;
            }

            .cid-s0bsbJEbVa .builder-sidebar {
                background-color: #ffffff;
            }

            .cid-s0bsbJEbVa .close-sidebar:focus {
                outline: 2px auto #6d7a71;
            }

            .cid-s0bsbJEbVa .close-sidebar span {
                background-color: #000000;
            }

            @media (min-width: 992px) {
                .cid-s0bsbJEbVa .menu-social-list {
                    padding-left: 3rem;
                }
            }

            @media (max-width: 991px) {
                .cid-s0bsbJEbVa .menu-social-list {
                    padding-top: 10px;
                }
            }

            .cid-s0bsc2KgEB {
                padding-top: 0px;
                padding-bottom: 0px;
                background-color: #6d7a71;
            }

            .cid-s0bsc2KgEB .content {
                padding: 4rem 0;
                max-width: 500px;
            }

            @media (min-width: 1400px) {
                .cid-s0bsc2KgEB .content {
                    margin: auto;
                }
            }

            .cid-s0bsc2KgEB .img-col {
                padding: 0;
            }

            .cid-s0btjSrjzP {
                padding-top: 75px;
                padding-bottom: 30px;
                background-color: #ffffff;
            }

            .cid-s0btjSrjzP .mbr-text {
                color: #757575;
            }

            .cid-s0bsg6BUXn {
                padding: 4rem;
                background-color: #ffffff;
            }

            .cid-s0bsg6BUXn .mbr-overlay {
                background-color: #232323;
                opacity: 0.1;
            }

            .cid-s0bsg6BUXn .content {
                padding-top: 450px;
                padding-bottom: 450px;
                max-width: 280px;
                margin: auto;
                z-index: 2;
                position: relative;
            }

            .cid-s0bsg6BUXn .img-col {
                padding: 0;
            }

            .cid-s0bsg6BUXn .col1 {
                position: relative;
                background-image: url("public/images/background135.jpg");
                background-size: cover;
                background-position: center;
            }

            .cid-s0bsg6BUXn .col2 {
                position: relative;
                background-image: url("public/images/background2.jpg");
                background-size: cover;
                background-position: center;
            }

            @media (max-width: 1400px) {
                .cid-s0bsg6BUXn {
                    padding: 4rem 1rem;
                }
            }

            @media (max-width: 992px) {
                .cid-s0bsg6BUXn .content {
                    padding-top: 330px;
                    padding-bottom: 330px;
                }
            }

            @media (max-width: 767px) {
                .cid-s0bsg6BUXn .content {
                    padding-top: 240px;
                    padding-bottom: 240px;
                }

                .cid-s0bsg6BUXn .col1 {
                    margin-bottom: 1rem;
                }
            }

            .cid-s0bsQkplRB {
                padding-top: 15px;
                padding-bottom: 0px;
                background-color: #ffffff;
            }

            .cid-s0bsm6ACwt {
                padding-top: 45px;
                padding-bottom: 45px;
                background-color: #ffffff;
            }

            @media (min-width: 1200px) {
                .cid-s0bsm6ACwt .content {
                    margin: 0 auto;
                    max-width: 600px;
                }
            }

            .cid-s0bsm6ACwt .mbr-text,
            .cid-s0bsm6ACwt .mbr-section-btn {
                color: #757575;
            }

            .cid-s0bsm6ACwt p {
                line-height: 1.9;
            }

            .cid-s0bsn70ibR {
                padding-top: 60px;
                padding-bottom: 30px;
                background-color: #ffffff;
            }

            .cid-s0bsn70ibR .content {
                background: #f5f5f5;
                padding: 4rem 1rem;
            }

            .cid-s0bsn70ibR .mbr-section-subtitle {
                color: #757575;
            }

            .cid-s0bsr5G3ha {
                padding-top: 5rem;
                padding-bottom: 2rem;
                background-color: #ffffff;
            }

            .cid-s0bsr5G3ha h3,
            .cid-s0bsr5G3ha h4,
            .cid-s0bsr5G3ha p,
            .cid-s0bsr5G3ha span {
                margin: 0;
            }

            .cid-s0bsr5G3ha .item-img,
            .cid-s0bsr5G3ha .item-box-img {
                align-items: center;
            }

            .cid-s0bsr5G3ha .item-img amp-img,
            .cid-s0bsr5G3ha .item-box-img amp-img,
            .cid-s0bsr5G3ha .item-img img,
            .cid-s0bsr5G3ha .item-box-img img {
                object-fit: cover;
                height: 500px;
            }

            @media (max-width: 992px) {

                .cid-s0bsr5G3ha .item-img amp-img,
                .cid-s0bsr5G3ha .item-box-img amp-img,
                .cid-s0bsr5G3ha .item-img img,
                .cid-s0bsr5G3ha .item-box-img img {
                    height: 300px;
                }
            }

            .cid-s0bsr5G3ha .item-box-img {
                padding: 0;
            }

            @media (min-width: 1400px) {
                .cid-s0bsr5G3ha .container-fluid {
                    padding: 0 2rem;
                }
            }

            .cid-s0bsr5G3ha .item-box {
                background: #efefef;
                justify-content: center;
                width: 100%;
                overflow: auto;
            }

            @media (min-width: 992px) {
                .cid-s0bsr5G3ha .item-box {
                    max-width: 1000px;
                }
            }

            @media (max-width: 991px) {
                .cid-s0bsr5G3ha .item-box {
                    width: 90%;
                    margin: 1rem;
                    padding-top: 3rem;
                }
            }

            .cid-s0bsr5G3ha .close:before,
            .cid-s0bsr5G3ha .close:after {
                background-color: #777;
            }

            .cid-s0bsr5G3ha .item-wrapper {
                cursor: pointer;
            }

            .cid-s0bsr5G3ha .item-wrapper .btn {
                padding: 1.2rem 5rem;
                transform: translateY(4rem);
                transition: all 0.3s;
            }

            .cid-s0bsr5G3ha .item:focus,
            .cid-s0bsr5G3ha span:focus {
                outline: none;
            }

            .cid-s0bsr5G3ha .item :hover {
                cursor: pointer;
            }

            .cid-s0bsr5G3ha .item .item-box-text:hover,
            .cid-s0bsr5G3ha .item .cur:hover,
            .cid-s0bsr5G3ha .item .item-box-price:hover {
                cursor: default;
            }

            .cid-s0bsr5G3ha .item:hover .btn {
                transform: translateY(0rem);
            }

            .cid-s0bsr5G3ha .item-wrapper,
            .cid-s0bsr5G3ha .item-box,
            .cid-s0bsr5G3ha .item-img {
                position: relative;
            }

            .cid-s0bsr5G3ha .item-btn,
            .cid-s0bsr5G3ha .item-box-btn {
                margin: 0;
            }

            .cid-s0bsr5G3ha .item-box-title {
                color: #000;
            }

            .cid-s0bsr5G3ha .item-box-text {
                color: #999999;
            }

            .cid-s0bsr5G3ha .amp-shop__title {
                text-align: center;
            }

            .cid-s0bsr5G3ha .item-box-wrapper {
                background-color: #efefef;
            }

            .cid-s0bsr5G3ha .item-wrapper {
                padding: 2rem 2rem;
            }

            .cid-s0bsr5G3ha .item-wrapper {
                position: relative;
                z-index: 0;
            }

            .cid-s0bsr5G3ha .item-wrapper:after {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                opacity: 1;
                background: #f5f5f5;
                transition: opacity .3s;
                pointer-events: none;
                z-index: -1;
            }

            .cid-s0bsr5G3ha .item-wrapper {
                color: #4a4a4a;
            }

            .cid-s0bsr5G3ha .btn {
                padding: 1.2rem 5rem;
                background-color: transparent;
                border-color: #232323;
            }

            .cid-s0bsr5G3ha .btn:before,
            .cid-s0bsr5G3ha .btn:after {
                background: #232323;
            }

            .cid-s0bsr5G3ha .btn:hover,
            .cid-s0bsr5G3ha .btn:focus,
            .cid-s0bsr5G3ha .btn:active {
                color: #232323;
                border-color: #232323;
            }

            .cid-s0bsr5G3ha .item-content {
                overflow: hidden;
            }

            .cid-s0bsr5G3ha .item-box-text1 {
                color: #757575;
            }

            @media (max-width: 767px) {
                .cid-s0bsr5G3ha .item .btn {
                    transform: translateY(0rem);
                }

                .cid-s0bsr5G3ha .item-wrapper {
                    padding: 2rem 1rem;
                }
            }

            .cid-s0bsJ2zwJy {
                padding-top: 165px;
                padding-bottom: 165px;
                background-image: url("public/images/background3.jpg");
            }

            .cid-s0bsJ2zwJy .mbr-overlay {
                background-color: #000000;
                opacity: 0.6;
            }

            .cid-s0bsJ2zwJy .counter-container {
                list-style: none;
            }

            .cid-s0bsJ2zwJy .counter-container ol {
                padding-left: 2rem;
            }

            .cid-s0bsJ2zwJy .counter-container li {
                position: relative;
                list-style: none;
                margin-bottom: 1rem;
            }

            .cid-s0bsJ2zwJy .counter-container li:before {
                box-sizing: border-box;
                position: absolute;
                left: -2rem;
                top: 50%;
                transform: translateY(-50%);
                height: 40px;
                content: '→';
                font-size: 1.5rem;
            }

            .cid-s0bt3IU31C {
                padding-top: 60px;
                padding-bottom: 60px;
                background-color: #ffffff;
            }

            .cid-s0bt3IU31C .card-img {
                overflow: hidden;
                height: 600px;
                margin-bottom: 1rem;
            }

            .cid-s0bt3IU31C .card-img amp-img,
            .cid-s0bt3IU31C .card-img img {
                object-fit: cover;
                min-height: 400px;
                transition: all 0.3s;
            }

            .cid-s0bt3IU31C p {
                position: relative;
                padding-left: 2rem;
                transition: all 0.3s;
                cursor: pointer;
                transform: translateY(1.5rem);
            }

            .cid-s0bt3IU31C p:before {
                box-sizing: border-box;
                position: absolute;
                left: 0rem;
                top: 50%;
                transform: translateY(-50%);
                height: 40px;
                content: '→';
                font-size: 1.5rem;
            }

            .cid-s0bt3IU31C .card-box {
                overflow: hidden;
            }

            .cid-s0bt3IU31C .card:hover amp-img,
            .cid-s0bt3IU31C .card:hover img {
                transform: scale(1.02);
            }

            .cid-s0bt3IU31C .card:hover p {
                transform: translateY(0rem);
            }

            @media (max-width: 767px) {
                .cid-s0bt3IU31C p {
                    transform: translateY(0rem);
                }

                .cid-s0bt3IU31C p:before {
                    height: 26px;
                }
            }

            .cid-s0bsiqoLOf {
                padding-top: 45px;
                padding-bottom: 45px;
                background-color: #eaeaea;
            }

            .cid-s0bsiqoLOf .content {
                padding: 4rem 0;
                max-width: 500px;
            }

            @media (min-width: 1400px) {
                .cid-s0bsiqoLOf .content {
                    margin: auto;
                }
            }

            .cid-s0bsyNmprb {
                padding-top: 75px;
                padding-bottom: 60px;
                background-color: #ffffff;
            }

            .cid-s0bsyNmprb .mbr-text {
                color: #757575;
            }

            .cid-s0bsyNmprb amp-img {
                max-width: 120px;
                cursor: pointer;
                opacity: 0.5;
                transition: all 0.3s;
                margin-bottom: 1rem;
            }

            .cid-s0bsyNmprb amp-img:hover {
                opacity: 1;
            }

            @media (min-width: 992px) {
                .cid-s0bsyNmprb .mbr-col-lg-1 {
                    flex: 0 0 10%;
                    max-width: 10%;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }
            }

            .cid-s0bsyNmprb .mbr-row:hover .line:after {
                width: 100%;
            }

            .cid-s0bsyNmprb .line {
                width: 100%;
                position: relative;
                height: 2px;
                margin: 3rem 1rem;
            }

            .cid-s0bsyNmprb .line:before {
                position: absolute;
                content: '';
                width: 100%;
                height: 1px;
                bottom: 0;
                background: #000000;
                left: 0;
                opacity: 0.2;
            }

            .cid-s0bsyNmprb .line:after {
                position: absolute;
                content: '';
                width: 0%;
                height: 1px;
                transition: all 2s;
                bottom: 0;
                background: #000000;
                left: 0;
            }

            .cid-s0bsDs1FSW {
                padding-top: 75px;
                padding-bottom: 75px;
                background-color: #ffffff;
            }

            .cid-s0bsDs1FSW .mbr-overlay {
                background-color: #ffffff;
                opacity: 0.7;
            }

            .cid-s0bsDs1FSW .mbr-row {
                justify-content: space-between;
            }

            .cid-s0bsDs1FSW .item {
                padding-bottom: 2rem;
            }

            .cid-s0bsDs1FSW .btn {
                padding: 1rem 4rem;
                cursor: pointer;
            }

            .cid-s0bsDs1FSW p {
                cursor: pointer;
            }

            .cid-s0bsDs1FSW .form-control,
            .cid-s0bsDs1FSW .field-input {
                padding: 0.7rem 1rem;
                font-size: 1rem;
                background-color: #ffffff;
                border-color: #cccccc;
                color: #000000;
                transition: 0.4s;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsDs1FSW .form-control::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .form-control::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input::-webkit-input-placeholder {
                color: #cccccc;
            }

            .cid-s0bsDs1FSW .form-control:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:-moz-placeholder,
            .cid-s0bsDs1FSW .form-control:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:-moz-placeholder {
                color: #cccccc;
            }

            .cid-s0bsDs1FSW .form-control:hover,
            .cid-s0bsDs1FSW .field-input:hover,
            .cid-s0bsDs1FSW .form-control:focus,
            .cid-s0bsDs1FSW .field-input:focus {
                background-color: #ffffff;
                border-color: #cccccc;
                color: #232323;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsDs1FSW .form-control:hover::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input:hover::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .form-control:focus::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input:focus::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .form-control:hover::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input:hover::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .form-control:focus::-webkit-input-placeholder,
            .cid-s0bsDs1FSW .field-input:focus::-webkit-input-placeholder {
                color: #cccccc;
            }

            .cid-s0bsDs1FSW .form-control:hover:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:hover:-moz-placeholder,
            .cid-s0bsDs1FSW .form-control:focus:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:focus:-moz-placeholder,
            .cid-s0bsDs1FSW .form-control:hover:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:hover:-moz-placeholder,
            .cid-s0bsDs1FSW .form-control:focus:-moz-placeholder,
            .cid-s0bsDs1FSW .field-input:focus:-moz-placeholder {
                color: #cccccc;
            }

            .cid-s0bsDs1FSW .jq-number__spin:hover,
            .cid-s0bsDs1FSW .jq-number__spin:focus {
                background-color: #ffffff;
                border-color: #cccccc;
                color: #ffffff;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsDs1FSW .jq-number__spin {
                background-color: #ffffff;
                border-color: #cccccc;
                color: #000000;
                transition: 0.4s;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsDs1FSW .jq-selectbox li,
            .cid-s0bsDs1FSW .jq-selectbox li {
                background-color: #ffffff;
                color: #000000;
            }

            .cid-s0bsDs1FSW .jq-selectbox li:hover,
            .cid-s0bsDs1FSW .jq-selectbox li.selected {
                background-color: #ffffff;
                color: #000000;
            }

            .cid-s0bsDs1FSW .jq-selectbox:hover .jq-selectbox__trigger-arrow,
            .cid-s0bsDs1FSW .jq-number__spin.minus:hover:after,
            .cid-s0bsDs1FSW .jq-number__spin.plus:hover:after {
                border-top-color: #ffffff;
                border-bottom-color: #ffffff;
            }

            .cid-s0bsDs1FSW .jq-selectbox .jq-selectbox__trigger-arrow,
            .cid-s0bsDs1FSW .jq-number__spin.minus:after,
            .cid-s0bsDs1FSW .jq-number__spin.plus:after {
                border-top-color: #ffffff;
                border-bottom-color: #ffffff;
            }

            .cid-s0bsDs1FSW input::-webkit-clear-button {
                display: none;
            }

            .cid-s0bsDs1FSW input::-webkit-inner-spin-button {
                display: none;
            }

            .cid-s0bsDs1FSW input::-webkit-outer-spin-button {
                display: none;
            }

            .cid-s0bsDs1FSW input::-webkit-calendar-picker-indicator {
                display: none;
            }

            @media (max-width: 767px) {
                .cid-s0bsDs1FSW .mbr-col-auto {
                    margin: auto;
                }
            }

            .cid-s0bsuTlESA {
                padding-top: 0px;
                padding-bottom: 0px;
                background-color: #ffffff;
            }

            .cid-s0bsuTlESA .container-fluid {
                padding-left: 0;
                padding-right: 0;
            }

            .cid-s0bsuTlESA .google-map {
                height: 30rem;
            }

            .cid-s0bsuTlESA .google-map iframe {
                height: 100%;
            }

            .cid-s0bsukEenN {
                padding-top: 60px;
                padding-bottom: 60px;
                background-color: #ffffff;
            }

            .cid-s0bsukEenN .mbr-overlay {
                background-color: #ffffff;
                opacity: 0.7;
            }

            .cid-s0bsukEenN .btn {
                margin: 0;
                height: 100%;
                padding: 0;
                border: 0;
                color: currentColor;
            }

            .cid-s0bsukEenN .btn:before,
            .cid-s0bsukEenN .btn:after {
                content: none;
            }

            .cid-s0bsukEenN .item {
                margin-bottom: 1rem;
            }

            .cid-s0bsukEenN .dragArea {
                margin: 0;
            }

            .cid-s0bsukEenN .field,
            .cid-s0bsukEenN .mbr-col-auto {
                padding: 0;
            }

            .cid-s0bsukEenN form .dragArea {
                border-bottom: 1px solid #000000;
                border-top: 0;
                margin: 0;
            }

            .cid-s0bsukEenN .form-control,
            .cid-s0bsukEenN .field-input {
                padding: 0.5rem 0;
                background-color: #ffffff;
                border: 0;
                font-size: 1rem;
                color: #000000;
                transition: 0.4s;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsukEenN .form-control::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input::-webkit-input-placeholder,
            .cid-s0bsukEenN .form-control::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input::-webkit-input-placeholder {
                color: #000000;
            }

            .cid-s0bsukEenN .form-control:-moz-placeholder,
            .cid-s0bsukEenN .field-input:-moz-placeholder,
            .cid-s0bsukEenN .form-control:-moz-placeholder,
            .cid-s0bsukEenN .field-input:-moz-placeholder {
                color: #000000;
            }

            .cid-s0bsukEenN .form-control:hover,
            .cid-s0bsukEenN .field-input:hover,
            .cid-s0bsukEenN .form-control:focus,
            .cid-s0bsukEenN .field-input:focus {
                background-color: #ffffff;
                border-color: #000000;
                color: #000000;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsukEenN .form-control:hover::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input:hover::-webkit-input-placeholder,
            .cid-s0bsukEenN .form-control:focus::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input:focus::-webkit-input-placeholder,
            .cid-s0bsukEenN .form-control:hover::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input:hover::-webkit-input-placeholder,
            .cid-s0bsukEenN .form-control:focus::-webkit-input-placeholder,
            .cid-s0bsukEenN .field-input:focus::-webkit-input-placeholder {
                color: #000000;
            }

            .cid-s0bsukEenN .form-control:hover:-moz-placeholder,
            .cid-s0bsukEenN .field-input:hover:-moz-placeholder,
            .cid-s0bsukEenN .form-control:focus:-moz-placeholder,
            .cid-s0bsukEenN .field-input:focus:-moz-placeholder,
            .cid-s0bsukEenN .form-control:hover:-moz-placeholder,
            .cid-s0bsukEenN .field-input:hover:-moz-placeholder,
            .cid-s0bsukEenN .form-control:focus:-moz-placeholder,
            .cid-s0bsukEenN .field-input:focus:-moz-placeholder {
                color: #000000;
            }

            .cid-s0bsukEenN .jq-number__spin:hover,
            .cid-s0bsukEenN .jq-number__spin:focus {
                background-color: #ffffff;
                border-color: #000000;
                color: #ffffff;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsukEenN .jq-number__spin {
                background-color: #ffffff;
                border-color: #000000;
                color: #000000;
                transition: 0.4s;
                box-shadow: none;
                outline: none;
            }

            .cid-s0bsukEenN .jq-selectbox li,
            .cid-s0bsukEenN .jq-selectbox li {
                background-color: #ffffff;
                color: #000000;
            }

            .cid-s0bsukEenN .jq-selectbox li:hover,
            .cid-s0bsukEenN .jq-selectbox li.selected {
                background-color: #ffffff;
                color: #000000;
            }

            .cid-s0bsukEenN .jq-selectbox:hover .jq-selectbox__trigger-arrow,
            .cid-s0bsukEenN .jq-number__spin.minus:hover:after,
            .cid-s0bsukEenN .jq-number__spin.plus:hover:after {
                border-top-color: #ffffff;
                border-bottom-color: #ffffff;
            }

            .cid-s0bsukEenN .jq-selectbox .jq-selectbox__trigger-arrow,
            .cid-s0bsukEenN .jq-number__spin.minus:after,
            .cid-s0bsukEenN .jq-number__spin.plus:after {
                border-top-color: #ffffff;
                border-bottom-color: #ffffff;
            }

            .cid-s0bsukEenN input::-webkit-clear-button {
                display: none;
            }

            .cid-s0bsukEenN input::-webkit-inner-spin-button {
                display: none;
            }

            .cid-s0bsukEenN input::-webkit-outer-spin-button {
                display: none;
            }

            .cid-s0bsukEenN input::-webkit-calendar-picker-indicator {
                display: none;
            }

            .cid-s0bsukEenN .mbr-section-title {
                color: #757575;
            }

            .cid-s0bsukEenN .mbr-text {
                color: #000000;
            }

            .cid-s0bsukEenN .mbr-section-subtitle {
                color: #757575;
            }

            .cid-s0bsukEenN .mbr-form-text {
                color: #757575;
            }

            [class*="-iconfont"] {
                display: inline-flex;
            }
        </style>

        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
        <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
        <!-- <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
        <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script> -->
        <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>


        <script async custom-element="amp-user-notification" src="https://cdn.ampproject.org/v0/amp-user-notification-0.1.js"></script>
    </head>

    <body>
        <amp-sidebar id="sidebar" class="cid-s0bsbJEbVa" layout="nodisplay" side="right">
            <div class="builder-sidebar" id="builder-sidebar">
                <button on="tap:sidebar.close" class="close-sidebar">
                    <span></span>
                    <span></span>
                </button>


                <!-- NAVBAR ITEMS -->
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="/femme">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="/homme">Men</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link  dropdown-toggle text-black display-4" data-toggle="dropdown-submenu" aria-expanded="false">Explore</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-black display-4" href="#">Sunglasses</a>
                            <a class="dropdown-item text-black display-4" href="#">Belts</a><a class="text-black dropdown-item display-4" href="#" aria-expanded="false">Accessories </a>
                        </div>
                    </li>
                    <?php
                    if (!$_SESSION['login']) {
                    ?>
                        <li class="nav-item"><a class="nav-link link  text-black display-4" href="/inscription" aria-expanded="false">Register/Login</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item"><a class="nav-link link  text-black display-4" href="/deconnexion" aria-expanded="false">Logout</a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link link  text-black display-4" href="contact.html" aria-expanded="false">Contacts</a></li>
                    <li class="nav-item"><a class="nav-link link  text-black display-4" href="help.html" aria-expanded="false">Help</a></li>
                    <?php
                    if ($_SESSION['login']) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link link  dropdown-toggle text-black display-4" data-toggle="dropdown" aria-expanded="false"><?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-black display-4" href="/monCompte">Mon compte</a>
                                <a class="text-black dropdown-item display-4" href="/panier">Mon panier</a>
                                <?php
                                if ($_SESSION['role'] === '2') {
                                ?>
                                    <a class="dropdown-item text-black display-4" href="/admin/user">Liste des utilisateurs</a>
                                    <a class="text-black dropdown-item display-4" href="/admin/typeUser">Types d'utilisateur</a>
                                    <a class="text-black dropdown-item display-4" href="/admin/produits">Liste des produits</a>
                                    <a class="text-black dropdown-item display-4" href="/admin/type">Types des produits</a>
                                    <a class="text-black dropdown-item display-4" href="/admin/status">Status des produits</a>
                                    <a class="text-black dropdown-item display-4" href="/admin/commandes">Liste des commandes</a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- NAVBAR ITEMS END -->
                <!-- SOCIAL ICON -->
                <div class="menu-social-list">






                    <a href="#" target="_blank">
                        <span class="amp-iconfont animation-normal fa-twitter-square fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M1408 610q-56 25-121 34 68-40 93-117-65 38-134 51-61-66-153-66-87 0-148.5 61.5t-61.5 148.5q0 29 5 48-129-7-242-65t-192-155q-29 50-29 106 0 114 91 175-47-1-100-26v2q0 75 50 133.5t123 72.5q-29 8-51 8-13 0-39-4 21 63 74.5 104t121.5 42q-116 90-261 90-26 0-50-3 148 94 322 94 112 0 210-35.5t168-95 120.5-137 75-162 24.5-168.5q0-18-1-27 63-45 105-109zm256-194v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"></path>
                            </svg></span>
                    </a><a href="#" target="_blank">
                        <span class="amp-iconfont animation-normal fa-instagram fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zm-502-220q-7 0-76.5-.5t-105.5 0-96.5 3-103 10-71.5 18.5q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103 18.5 71.5q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103-18.5-71.5q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"></path>
                            </svg></span>
                    </a><a href="#" target="_blank">
                        <span class="amp-iconfont animation-normal fa-facebook-square fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M1376 128q119 0 203.5 84.5t84.5 203.5v960q0 119-84.5 203.5t-203.5 84.5h-188v-595h199l30-232h-229v-148q0-56 23.5-84t91.5-28l122-1v-207q-63-9-178-9-136 0-217.5 80t-81.5 226v171h-200v232h200v595h-532q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960z"></path>
                            </svg></span>
                    </a></div>
                <!-- SOCIAL ICON END -->
                <!-- SHOW BUTTON -->

                <!-- SHOW BUTTON END -->
            </div>
        </amp-sidebar>
        <section class="menu1 menu horizontal-menu cid-s0bsbJEbVa" id="menu1-0">

            <!-- <div class="menu-wrapper"> -->
            <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
                <div class="menu-container container-fluid mbr-px-2">
                    <!-- SHOW LOGO -->
                    <div class="navbar-brand">

                        <span class="navbar-caption-wrap"><a class="navbar-caption  text-black display-6 display-5" href="/">ProductAMP</a></span>
                    </div>
                    <!-- SHOW LOGO END -->
                    <!-- COLLAPSED MENU -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- NAVBAR ITEMS -->
                        <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link link text-black display-4" href="/femme">Women</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link text-black display-4" href="/homme">Men</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link link  dropdown-toggle text-black display-4" data-toggle="dropdown" aria-expanded="false">Explore</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-black display-4" href="#">Sunglasses</a>
                                    <a class="dropdown-item text-black display-4" href="#">Belts</a>
                                    <a class="text-black dropdown-item display-4" href="#" aria-expanded="false">Accessories </a>
                                </div>
                            </li>
                            <?php
                            if (!$_SESSION['login']) {
                            ?>
                                <li class="nav-item"><a class="nav-link link  text-black display-4" href="/inscription" aria-expanded="false">Register/Login</a></li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item"><a class="nav-link link  text-black display-4" href="/deconnexion" aria-expanded="false">Logout</a></li>
                            <?php
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link link  text-black display-4" href="contact.html" aria-expanded="false">Contacts</a></li>
                            <li class="nav-item"><a class="nav-link link  text-black display-4" href="help.html" aria-expanded="false">Help</a></li>
                            <?php
                            if ($_SESSION['login']) {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link  dropdown-toggle text-black display-4" data-toggle="dropdown" aria-expanded="false"><?= $_SESSION['login'] ?></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-black display-4" href="/monCompte">Mon compte</a>
                                        <a class="text-black dropdown-item display-4" href="/panier">Mon panier</a>
                                        <?php
                                        if ($_SESSION['role'] === '2') {
                                        ?>
                                            <a class="dropdown-item text-black display-4" href="/admin/user">Liste des utilisateurs</a>
                                            <a class="text-black dropdown-item display-4" href="/admin/typeUser">Types d'utilisateur</a>
                                            <a class="text-black dropdown-item display-4" href="/admin/produits">Liste des produits</a>
                                            <a class="text-black dropdown-item display-4" href="/admin/type">Types des produits</a>
                                            <a class="text-black dropdown-item display-4" href="/admin/status">Status des produits</a>
                                            <a class="text-black dropdown-item display-4" href="/admin/commandes">Liste des commandes</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <!-- NAVBAR ITEMS END -->
                        <!-- SOCIAL ICON -->
                        <div class="menu-social-list">






                            <a href="#" target="_blank">
                                <span class="amp-iconfont animation-normal fa-twitter-square fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path d="M1408 610q-56 25-121 34 68-40 93-117-65 38-134 51-61-66-153-66-87 0-148.5 61.5t-61.5 148.5q0 29 5 48-129-7-242-65t-192-155q-29 50-29 106 0 114 91 175-47-1-100-26v2q0 75 50 133.5t123 72.5q-29 8-51 8-13 0-39-4 21 63 74.5 104t121.5 42q-116 90-261 90-26 0-50-3 148 94 322 94 112 0 210-35.5t168-95 120.5-137 75-162 24.5-168.5q0-18-1-27 63-45 105-109zm256-194v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"></path>
                                    </svg></span>
                            </a><a href="#" target="_blank">
                                <span class="amp-iconfont animation-normal fa-instagram fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zm-502-220q-7 0-76.5-.5t-105.5 0-96.5 3-103 10-71.5 18.5q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103 18.5 71.5q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103-18.5-71.5q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"></path>
                                    </svg></span>
                            </a><a href="#" target="_blank">
                                <span class="amp-iconfont animation-normal fa-facebook-square fa"><svg width="24" height="24" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                        <path d="M1376 128q119 0 203.5 84.5t84.5 203.5v960q0 119-84.5 203.5t-203.5 84.5h-188v-595h199l30-232h-229v-148q0-56 23.5-84t91.5-28l122-1v-207q-63-9-178-9-136 0-217.5 80t-81.5 226v171h-200v232h200v595h-532q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960z"></path>
                                    </svg></span>
                            </a></div>
                        <!-- SOCIAL ICON END -->
                        <!-- SHOW BUTTON -->

                        <!-- SHOW BUTTON END -->
                    </div>
                    <!-- COLLAPSED MENU END -->

                    <button on="tap:sidebar.toggle" class="ampstart-btn hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </nav>
            <!-- AMP plug -->

            <!-- </div> -->
        </section>

    <?php
}
