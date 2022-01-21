<?php
/**
 * Template Name: Book page
 **/
get_header() ?>
<div id="code_block-118-8" class="ct-code-block">
    <style>
        #_header_row-36-8.oxy-header-row .oxy-header-container {
            width: 100%;
        }

        .preloader-wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .preloader-wrapper {
            display: table;
            position: fixed;
            top: 0;
            width: 100vw;
            height: 100vh;
            min-height: 420px;
            background-color: #fff;
            z-index: 9999;
            overflow: hidden;
        }

        .preloader-innerWrapper {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }

        .preloader-block {
            position: relative;
            width: 100vw;
            height: 100vh;
            margin: 0 auto;
        }

        .preloader-innerBlock {
            position: absolute;
            bottom: 50%;
            left: 50%;
            width: 440px;
            z-index: 20;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .preloader-innerBlock .main-title-block .title-block {
            margin-bottom: 10px;
            text-align: center;
            opacity: 0;
        }

        .preloader-innerBlock .main-title-block .title-block h2 {
            font-family: "Bauhaus Std", sans-serif;
            color: #fff;
            font-size: 2.6em;
            line-height: 51px;
            letter-spacing: .018em;
        }

        .preloader-innerBlock .main-title-block .content-block {
            text-align: center;
        }

        .preloader-innerBlock .main-title-block .subtitle-block {
            margin-bottom: 15px;
            color: #fff;
        }

        .preloader-innerBlock .main-title-block .subtitle-block .number-block {
            opacity: 0;
        }

        .preloader-innerBlock .main-title-block .subtitle-block .number-line {
            font-family: "Hurme Geometric Sans 1", sans-serif;
            font-size: 8em;
            font-weight: 100;
            line-height: 100%;
        }

        .preloader-innerBlock .main-title-block .subtitle-block .text-block {
            display: inline-block;
            position: relative;
            bottom: 50px;
            width: 100%;
            color: #fff;
            background-color: transparent;
        }

        .preloader-innerBlock .main-title-block .subtitle-block .text-line {
            font-size: .65em;
            line-height: 12px;
            letter-spacing: .74em;
        }

        .preloader-innerBlock .main-title-block .subtitle-block .text-line span {
            font-family: "Bauhaus Std", sans-serif;
            font-weight: 300;
            margin: 0 15px;
            line-height: inherit;
            opacity: 0;
        }

        .preloader-innerBlock .svg-innerBlock svg {
            width: 100%;
            height: auto;
        }

        .preloader-innerBlock .svg-innerBlock.title-block {
            margin-bottom: 20px;
        }

        .preloader-innerWrapper .bg-image {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
        }

        .preloader-innerWrapper .bg-image:before,
        .preloader-innerWrapper .bg-image:after {
            content: '';
            position: absolute;
            top: 0;
            width: 52%;
            height: 100%;
        }

        .preloader-innerWrapper .bg-image:before {
            left: 0;
            background-color: #c51923;
        }

        .preloader-innerWrapper .bg-image:after {
            right: 0;
            background-color: #c51923;
        }

        .preloader-innerWrapper.loader .bg-image:before {
            left: 0;
            background-color: #ffffff;
        }

        .preloader-innerWrapper.loader .bg-image:after {
            right: 0;
            background-color: #ffffff;
        }

        .preloader-innerWrapper .bg-image img {
            position: absolute;
            margin-bottom: -80px;
            bottom: 0;
            left: 50%;
            width: auto;
            max-width: inherit;
            max-height: 100%;
            opacity: 0;
            z-index: 10;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
            -webkit-transition: margin-bottom .6s, opacity .4s;
            transition: margin-bottom .6s, opacity .4s;
        }

        .preloader-innerWrapper .bg-image img.ready {
            margin-bottom: 0;
            opacity: 1;
        }

        .preloader-innerWrapper .bg-image .svg-block.title-block {
            position: absolute;
            bottom: 50px;
            right: 50%;
            width: auto;
            height: 55px;
            max-width: unset;
            opacity: 0;
            z-index: 20;
            -webkit-transform: translateX(-50%) scale(1.6);
            transform: translateX(-50%) scale(1.6);
        }

        .preloader-innerWrapper .bg-image .svg-block.title-block svg {
            position: absolute;
            width: 320px;
            height: auto;
            left: 50%;
            -webkit-transform: translateX(50%);
            transform: translateX(50%);
        }

        .preloader-innerWrapper .bg-image .svg-block.title-block svg path {
            fill: transparent;
            stroke: #fff;
            stroke-width: 1;
            -webkit-transition: fill .4s, stroke-width .4s;
            transition: fill .4s, stroke-width .4s;
        }

        .preloader-innerWrapper .bg-image .svg-block.title-block svg path.ready {
            fill: #fff;
            stroke-width: 0;
        }

        .svg-animate path {
            -webkit-transition: fill .4s, stroke-width .4s;
            transition: fill .4s, stroke-width .4s;
        }

        .svg-animate .draw-letter-group path {
            fill: transparent;
            stroke: #fff;
            stroke-width: 1px;
        }

        .svg-animate path:not(.no-animate).ready {
            fill: #fff;
            stroke-width: 0;
        }

        .svg-animate .draw-letter-group path.ready {
            fill: #fff;
            stroke-width: 0;
        }

        .svg-animate .fade-letter-group {
            opacity: 0;
            -webkit-transform: translateX(20px);
            transform: translateX(20px);
            -webkit-transition: opacity 0.8s, -webkit-transform 0.8s;
            transition: opacity 0.8s, -webkit-transform 0.8s;
            transition: opacity 0.8s, transform 0.8s;
            transition: opacity 0.8s, transform 0.8s, -webkit-transform 0.8s;
        }

        .svg-animate .fade-letter-group.ready {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .svg-animate .print-letter-group path {
            opacity: 0;
            -webkit-transition: opacity 0.4s;
            transition: opacity 0.4s;
        }

        .svg-animate .print-letter-group path.ready {
            opacity: 1;
        }

        /* ----- start preloader ----- */
        @media only screen and (min-height: 861px) {
            .preloader-innerBlock {
                margin-bottom: 90px;
                -webkit-transform: translate(-50%, 0) scale(1.6);
                transform: translate(-50%, 0) scale(1.6);
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                margin-bottom: 20px;
                -webkit-transform: translateX(-50%) scale(1.6);
                transform: translateX(-50%) scale(1.6);
            }
        }

        @media only screen and (max-height: 860px) {
            .preloader-innerBlock {
                margin-bottom: 90px;
                -webkit-transform: translate(-50%, 0) scale(1.4);
                transform: translate(-50%, 0) scale(1.4);
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                margin-bottom: 20px;
                -webkit-transform: translateX(-50%) scale(1.4);
                transform: translateX(-50%) scale(1.4);
            }
        }

        @media only screen and (max-height: 780px) {
            .preloader-innerWrapper {
                background-color: #c51923;
            }

            .preloader-innerWrapper.loader {
                background-color: #ffffff;
            }

            .preloader-innerBlock {
                margin-bottom: 0;
                -webkit-transform: translate(-50%, 0) scale(1.3);
                transform: translate(-50%, 0) scale(1.3);
            }

            .preloader-innerWrapper .bg-image {
                top: 80px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 80px;
                -webkit-transform: translateX(-40%) scale(1.3);
                transform: translateX(-40%) scale(1.3);
            }
        }

        @media only screen and (max-height: 640px) {
            .preloader-innerBlock {
                -webkit-transform: translate(-50%, 0) scale(1.1);
                transform: translate(-50%, 0) scale(1.1);
            }
        }

        @media only screen and (max-height: 560px) {
            .preloader-innerBlock {
                margin-bottom: -40px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                -webkit-transform: translateX(-40%) scale(1.1);
                transform: translateX(-40%) scale(1.1);
            }
        }

        @media only screen and (max-width: 1600px) {
            .preloader-innerBlock {
                margin-bottom: 20px;
            }

            .preloader-innerWrapper .bg-image img {
                max-width: 1600px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                -webkit-transform: translateX(-50%) scale(1.4);
                transform: translateX(-50%) scale(1.4);
            }
        }

        @media only screen and (max-width: 1440px) {
            .preloader-innerWrapper .bg-image img {
                max-width: 1400px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                -webkit-transform: translateX(-44%) scale(1.2);
                transform: translateX(-44%) scale(1.2);
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block svg {
                -webkit-transform: translateX(40%);
                transform: translateX(40%);
            }
        }

        @media only screen and (max-width: 1200px) {
            .preloader-innerWrapper {
                background-color: #c51923;
            }

            .preloader-innerWrapper.loader {
                background-color: #ffffff;
            }

            .preloader-innerWrapper .bg-image {
                top: 70px;
            }

            .preloader-innerWrapper .bg-image img {
                max-width: 1200px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 50%;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block svg {
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }
        }

        @media only screen and (min-width: 1201px) and (max-height: 640px) {
            .preloader-innerBlock {
                -webkit-transform: translate(-50%, 0) scale(1.1);
                transform: translate(-50%, 0) scale(1.1);
            }
        }

        @media only screen and (min-width: 1201px) and (max-height: 560px) {
            .preloader-innerBlock {
                margin-bottom: -40px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                -webkit-transform: translateX(-40%) scale(1.1);
                transform: translateX(-40%) scale(1.1);
            }
        }

        @media only screen and (max-width: 980px) and (max-height: 740px) {
            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 53%;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                -webkit-transform: translateX(-50%) scale(1.1);
                transform: translateX(-50%) scale(1.1);
            }
        }

        @media only screen and (max-width: 980px) {
            .preloader-innerWrapper .bg-image img {
                max-width: 1000px;
            }
        }

        @media only screen and (max-width: 820px) and (max-height: 380px) {
            .preloader-innerBlock {
                bottom: 38%;
                -webkit-transform: translate(-50%, 0) scale(1);
                transform: translate(-50%, 0) scale(1);
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 55%;
                -webkit-transform: translateX(-50%) scale(0.9);
                transform: translateX(-50%) scale(0.9);
            }
        }

        @media only screen and (max-width: 750px) {
            .preloader-innerWrapper .bg-image img {
                max-width: 880px;
            }
        }

        @media only screen and (max-width: 750px) and (max-height: 550px) {
            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 55%;
            }
        }

        @media only screen and (max-width: 610px) {
            .preloader-innerBlock {
                -webkit-transform: translate(-50%, 0) scale(1);
                transform: translate(-50%, 0) scale(1);
            }

            .preloader-innerWrapper .bg-image img {
                max-width: 660px;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 55%;
                -webkit-transform: translateX(-50%) scale(0.9);
                transform: translateX(-50%) scale(0.9);
            }
        }

        @media only screen and (max-width: 540px) and (min-height: 621px) {
            .preloader-innerWrapper .bg-image {
                top: 0;
            }

            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 40%;
            }
        }

        @media only screen and (max-width: 470px) and (min-height: 701px) {
            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 43%;
            }

            .preloader-innerWrapper .bg-image {
                top: 0;
            }
        }

        @media only screen and (max-width: 470px) and (max-height: 700px) {
            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 41%;
            }
        }

        @media only screen and (max-width: 470px) {
            .preloader-innerBlock {
                -webkit-transform: translate(-50%, 0) scale(0.9);
                transform: translate(-50%, 0) scale(0.9);
            }

            .preloader-innerBlock .main-title-block .content-block {
                -webkit-transform: translateY(15px) scale(1.1);
                transform: translateY(15px) scale(1.1);
            }
        }

        @media only screen and (max-width: 400px) {
            .preloader-innerBlock {
                -webkit-transform: translate(-50%, 0) scale(0.8);
                transform: translate(-50%, 0) scale(0.8);
            }

            .preloader-innerBlock .main-title-block .subtitle-block .text-line span {
                font-size: 1.2em;
            }
        }

        @media only screen and (max-width: 420px) and (max-height: 620px) {
            .preloader-innerWrapper .bg-image .svg-block.title-block {
                bottom: 40%;
            }

            .preloader-innerWrapper .bg-image {
                top: 0;
            }

            .preloader-innerWrapper .bg-image img {
                max-width: 600px;
            }
        }
    </style>
    <div class="preloader-wrapper">
        <div class="preloader-innerWrapper">
            <div class="svg-block preloader-block">
                <div class="preloader-innerBlock">
                    <div class="main-title-block">
                        <div class="title-block">
                            <h2><?= __('Facettes en céramique', 'page-book') ?></h2>
                        </div>

                        <div class="content-block">
                            <div class="subtitle-block">
                                <div class="number-block">
                                    <span class="number-line animation-number-counter" data-number-finish="20">0</span>
                                </div>

                                <div class="text-block">
                                    <p class="text-line"><span><?= __('RECETTES', 'page-book') ?></span> <span><?= __('POUR', 'page-book') ?></span> <span><?= __('RÉUSSIR', 'page-book') ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-image">
                <img src="<?= get_template_directory_uri() ?>/img/preloader2-bg-notitle.jpg">
                <div class="svg-block title-block">
                    <svg width="318" height="55" viewBox="0 0 318 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M62.5198 41.9165C62.5198 41.9165 61.8454 44.6124 59.2602 44.4302C57.3495 44.2845 56.263 41.8072 53.3032 41.7344C50.8679 41.6615 50.1935 42.463 50.1935 42.463C50.1935 42.463 50.0436 41.4429 51.6921 40.6779C53.3406 39.8764 55.8508 40.35 57.4993 41.3336C59.1478 42.3173 59.1104 43.0094 60.2344 43.0459C61.4333 43.0823 62.5198 41.9165 62.5198 41.9165Z" fill="white" class="ready" style="stroke-dasharray: 28.8295px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M53.1157 31.1329C55.3262 31.1329 57.1246 31.8251 58.5857 33.1731C60.0469 34.521 60.7962 36.2333 60.7962 38.2734C60.7962 40.3135 60.0469 41.9893 58.5857 43.3373C57.1246 44.6852 55.2513 45.341 53.0033 45.341C50.8678 45.341 49.0694 44.6852 47.6457 43.3373C46.222 41.9893 45.5101 40.3135 45.5101 38.3098C45.5101 36.2333 46.222 34.521 47.6832 33.1731C49.1069 31.8251 50.9427 31.1329 53.1157 31.1329ZM53.2281 33.0273C51.6171 33.0273 50.2683 33.5374 49.2193 34.521C48.1702 35.5046 47.6457 36.7797 47.6457 38.3098C47.6457 39.8035 48.1702 41.0421 49.2193 42.0258C50.2683 43.0094 51.5796 43.5194 53.1532 43.5194C54.7268 43.5194 56.0755 43.0094 57.1246 41.9893C58.1736 40.9693 58.7356 39.7306 58.7356 38.237C58.7356 36.7797 58.2111 35.5411 57.1246 34.5574C56.0755 33.5009 54.7642 33.0273 53.2281 33.0273Z"
                              fill="white" style="stroke-dasharray: 80.7891px; stroke-dashoffset: 0px;"></path>
                        <path d="M73.3474 31.3516H75.3705V39.1113C75.3705 40.1678 75.2956 40.9693 75.1457 41.4794C74.9959 42.0258 74.8085 42.463 74.5463 42.8273C74.3215 43.1916 74.0218 43.4831 73.6846 43.7745C72.5606 44.7217 71.0994 45.1589 69.3011 45.1589C67.4652 45.1589 66.004 44.6853 64.8801 43.7745C64.5429 43.4831 64.2431 43.1552 64.0183 42.8273C63.7936 42.463 63.6062 42.0258 63.4564 41.5158C63.3065 41.0058 63.2316 40.2043 63.2316 39.0749V31.3516H65.2547V39.1113C65.2547 40.3864 65.4046 41.2972 65.7043 41.8072C66.004 42.3173 66.4536 42.718 67.0906 43.0095C67.69 43.3009 68.4393 43.4466 69.2636 43.4466C70.4625 43.4466 71.4366 43.1552 72.1859 42.5359C72.5981 42.208 72.8603 41.8072 73.0476 41.3701C73.235 40.9329 73.3099 40.1678 73.3099 39.0749V31.3516H73.3474Z"
                              fill="white" style="stroke-dasharray: 68.572px; stroke-dashoffset: 0px;"></path>
                        <path d="M78.6676 31.3516H80.6908V45.0132H78.6676V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 31.3696px; stroke-dashoffset: 0px;"></path>
                        <path d="M95.4149 31.3516H97.3256V45.0132H95.6022L86.1982 34.4846V45.0132H84.325V31.3516H85.9735L95.4523 41.953V31.3516H95.4149Z" fill="white" class="ready" style="stroke-dasharray: 83.9843px; stroke-dashoffset: 0px;"></path>
                        <path d="M99.611 31.3152H111.338V33.0639H106.43V45.0132H104.407V33.0639H99.5735V31.3152H99.611Z" fill="white" class="ready" style="stroke-dasharray: 50.925px; stroke-dashoffset: 0px;"></path>
                        <path d="M113.736 31.3516H121.716V33.1002H115.759V37.2534H121.529V39.0021H115.759V43.2645H121.903V45.0132H113.736V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 67.1112px; stroke-dashoffset: 0px;"></path>
                        <path d="M128.01 39.2939L126.474 38.3831C125.5 37.8002 124.826 37.2538 124.413 36.7073C124.001 36.1608 123.814 35.5051 123.814 34.8129C123.814 33.72 124.189 32.8456 124.975 32.1899C125.725 31.5341 126.736 31.1698 127.973 31.1698C129.134 31.1698 130.221 31.4977 131.195 32.117V34.3393C130.183 33.3921 129.097 32.9185 127.935 32.9185C127.261 32.9185 126.736 33.0642 126.324 33.3557C125.912 33.6471 125.687 34.0478 125.687 34.485C125.687 34.8858 125.837 35.2865 126.137 35.6508C126.437 36.0151 126.961 36.3794 127.635 36.7802L129.172 37.6545C130.895 38.6381 131.757 39.9132 131.757 41.4433C131.757 42.5362 131.382 43.447 130.633 44.1028C129.883 44.795 128.909 45.1228 127.673 45.1228C126.287 45.1228 125.013 44.7221 123.889 43.8842V41.4069C124.975 42.7548 126.249 43.4106 127.673 43.4106C128.31 43.4106 128.834 43.2284 129.247 42.9005C129.659 42.5727 129.883 42.1355 129.883 41.6255C129.846 40.824 129.247 40.0225 128.01 39.2939Z"
                              fill="white" style="stroke-dasharray: 58.1939px; stroke-dashoffset: 0px;"></path>
                        <path d="M137.901 39.2939L136.365 38.3831C135.391 37.8002 134.717 37.2538 134.304 36.7073C133.892 36.1608 133.705 35.5051 133.705 34.8129C133.705 33.72 134.08 32.8456 134.866 32.1899C135.653 31.5341 136.627 31.1698 137.864 31.1698C139.025 31.1698 140.112 31.4977 141.086 32.117V34.3393C140.074 33.3921 138.988 32.9185 137.826 32.9185C137.152 32.9185 136.627 33.0642 136.215 33.3557C135.803 33.6471 135.578 34.0478 135.578 34.485C135.578 34.8858 135.728 35.2865 136.028 35.6508C136.328 36.0151 136.852 36.3794 137.526 36.7802L139.063 37.6545C140.786 38.6381 141.648 39.9132 141.648 41.4433C141.648 42.5362 141.273 43.447 140.524 44.1028C139.774 44.795 138.8 45.1228 137.564 45.1228C136.178 45.1228 134.904 44.7221 133.78 43.8842V41.4069C134.866 42.7548 136.14 43.4106 137.564 43.4106C138.201 43.4106 138.725 43.2284 139.138 42.9005C139.55 42.5727 139.774 42.1355 139.774 41.6255C139.774 40.824 139.138 40.0225 137.901 39.2939Z"
                              fill="white" style="stroke-dasharray: 58.2002px; stroke-dashoffset: 0px;"></path>
                        <path d="M144.345 31.3516H152.326V33.1002H146.368V37.2534H152.138V39.0021H146.368V43.2645H152.513V45.0132H144.345V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 67.1152px; stroke-dashoffset: 0px;"></path>
                        <path d="M166.338 31.3516H168.249V45.0132H166.525L157.121 34.4846V45.0132H155.21V31.3516H156.859L166.338 41.953V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 83.9862px; stroke-dashoffset: 0px;"></path>
                        <path d="M183.834 41.8436V43.993C182.373 44.7581 180.65 45.1588 178.739 45.1588C177.165 45.1588 175.854 44.8674 174.73 44.2481C173.644 43.6287 172.782 42.7908 172.145 41.6979C171.508 40.605 171.171 39.4756 171.171 38.2005C171.171 36.1968 171.883 34.521 173.344 33.1731C174.805 31.8251 176.603 31.1329 178.739 31.1329C180.2 31.1329 181.849 31.4972 183.647 32.2623V34.3753C181.999 33.4645 180.388 32.9909 178.814 32.9909C177.203 32.9909 175.854 33.5009 174.805 34.4846C173.756 35.4682 173.194 36.7069 173.194 38.2005C173.194 39.6942 173.719 40.9329 174.768 41.9165C175.817 42.9001 177.165 43.3737 178.776 43.3737C180.537 43.3737 182.223 42.8637 183.834 41.8436Z"
                              fill="white" style="stroke-dasharray: 65.2033px; stroke-dashoffset: 0px;"></path>
                        <path d="M186.794 31.3516H194.775V33.1002H188.817V37.2534H194.587V39.0021H188.817V43.2645H194.962V45.0132H186.794V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 67.1152px; stroke-dashoffset: 0px;"></path>
                        <path d="M203.654 45.0132V31.3152H208.112C209.461 31.3152 210.51 31.6795 211.334 32.3717C212.121 33.0639 212.533 34.0111 212.533 35.2133C212.533 36.0148 212.346 36.707 211.934 37.3263C211.522 37.9456 210.96 38.3828 210.248 38.6742C209.536 38.9657 208.525 39.075 207.176 39.075H205.677V45.0132H203.654ZM207.775 33.0639H205.677V37.3263H207.888C208.712 37.3263 209.349 37.1441 209.761 36.7798C210.21 36.4155 210.435 35.8691 210.435 35.1769C210.435 33.7561 209.536 33.0639 207.775 33.0639Z"
                              fill="white" style="stroke-dasharray: 58.0533px; stroke-dashoffset: 0px;"></path>
                        <path d="M224.523 31.3516H226.546V39.1113C226.546 40.1678 226.471 40.9693 226.321 41.4794C226.171 42.0258 225.984 42.463 225.721 42.8273C225.497 43.1916 225.197 43.4831 224.86 43.7745C223.736 44.7217 222.275 45.1589 220.476 45.1589C218.64 45.1589 217.179 44.6853 216.055 43.7745C215.718 43.4831 215.418 43.1552 215.194 42.8273C214.969 42.463 214.781 42.0258 214.632 41.5158C214.482 41.0058 214.407 40.2043 214.407 39.0749V31.3516H216.43V39.1113C216.43 40.3864 216.58 41.2972 216.88 41.8072C217.179 42.3173 217.629 42.718 218.266 43.0095C218.865 43.3009 219.615 43.4466 220.439 43.4466C221.638 43.4466 222.612 43.1552 223.361 42.5359C223.773 42.208 224.035 41.8072 224.223 41.3701C224.41 40.9329 224.485 40.1678 224.485 39.0749V31.3516H224.523Z"
                              fill="white" style="stroke-dasharray: 68.5721px; stroke-dashoffset: 0px;"></path>
                        <path d="M234.563 45.0132H229.805V31.3516H233.477C234.638 31.3516 235.537 31.4973 236.212 31.7887C236.849 32.0802 237.373 32.5174 237.71 33.0274C238.047 33.5738 238.235 34.1567 238.235 34.8854C238.235 36.2333 237.523 37.1805 236.099 37.7634C237.111 37.9456 237.935 38.3463 238.534 39.0021C239.134 39.6214 239.434 40.3864 239.434 41.2608C239.434 41.953 239.246 42.5723 238.872 43.1187C238.497 43.6652 237.972 44.1024 237.261 44.4667C236.549 44.831 235.65 45.0132 234.563 45.0132ZM233.552 33.0638H231.828V37.1805H233.177C234.263 37.1805 235.013 36.9984 235.462 36.5976C235.912 36.1969 236.137 35.6868 236.137 35.0675C236.137 33.7196 235.275 33.0638 233.552 33.0638ZM233.701 38.9292H231.828V43.2645H233.814C234.9 43.2645 235.65 43.1916 236.062 43.0095C236.436 42.8273 236.774 42.5723 236.998 42.2444C237.223 41.8801 237.373 41.5158 237.373 41.115C237.373 40.7143 237.261 40.3136 236.998 39.9857C236.736 39.6578 236.399 39.3664 235.912 39.2206C235.425 39.0021 234.713 38.9292 233.701 38.9292Z"
                              fill="white" style="stroke-dasharray: 77.5629px; stroke-dashoffset: 0px;"></path>
                        <path d="M241.869 31.3516H243.892V43.228H250.224V45.0132H241.869V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 44.0332px; stroke-dashoffset: 0px;"></path>
                        <path d="M252.472 31.3516H254.495V45.0132H252.472V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 31.3692px; stroke-dashoffset: 0px;"></path>
                        <path d="M261.576 39.2939L260.04 38.3831C259.066 37.8002 258.392 37.2538 257.98 36.7073C257.567 36.1608 257.38 35.5051 257.38 34.8129C257.38 33.72 257.755 32.8456 258.542 32.1899C259.291 31.5341 260.302 31.1698 261.539 31.1698C262.7 31.1698 263.787 31.4977 264.761 32.117V34.3393C263.749 33.3921 262.663 32.9185 261.501 32.9185C260.827 32.9185 260.302 33.0642 259.89 33.3557C259.478 33.6471 259.253 34.0478 259.253 34.485C259.253 34.8858 259.403 35.2865 259.703 35.6508C260.003 36.0151 260.527 36.3794 261.202 36.7802L262.738 37.6545C264.461 38.6381 265.323 39.9132 265.323 41.4433C265.323 42.5362 264.948 43.447 264.199 44.1028C263.45 44.795 262.475 45.1228 261.239 45.1228C259.853 45.1228 258.579 44.7221 257.455 43.8842V41.4069C258.542 42.7548 259.815 43.4106 261.239 43.4106C261.876 43.4106 262.401 43.2284 262.813 42.9005C263.225 42.5727 263.45 42.1355 263.45 41.6255C263.412 40.824 262.813 40.0225 261.576 39.2939Z"
                              fill="white" style="stroke-dasharray: 58.1942px; stroke-dashoffset: 0px;"></path>
                        <path d="M277.911 31.3516H279.935V45.0132H277.911V39.0749H270.006V45.0132H267.983V31.3516H270.006V37.2534H277.911V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 74.9074px; stroke-dashoffset: 0px;"></path>
                        <path d="M283.494 31.3516H285.517V45.0132H283.494V31.3516Z" fill="white" class="ready" style="stroke-dasharray: 31.3692px; stroke-dashoffset: 0px;"></path>
                        <path d="M300.279 31.3516H302.189V45.0132H300.466L291.062 34.4846V45.0132H289.189V31.3516H290.837L300.316 41.953V31.3516H300.279Z" fill="white" class="ready" style="stroke-dasharray: 83.9823px; stroke-dashoffset: 0px;"></path>
                        <path d="M313.279 38.2738H318V44.0663C316.277 44.795 314.553 45.1593 312.83 45.1593C310.507 45.1593 308.633 44.5035 307.247 43.192C305.861 41.8805 305.149 40.2411 305.149 38.3103C305.149 36.2701 305.861 34.5579 307.322 33.2099C308.746 31.862 310.582 31.1698 312.755 31.1698C313.542 31.1698 314.291 31.2427 315.003 31.4248C315.715 31.607 316.614 31.8984 317.7 32.3356V34.3393C316.014 33.3921 314.366 32.9185 312.717 32.9185C311.181 32.9185 309.87 33.4285 308.821 34.4486C307.772 35.4686 307.247 36.7073 307.247 38.201C307.247 39.7675 307.772 41.0061 308.821 41.9898C309.87 42.9734 311.219 43.4835 312.867 43.4835C313.654 43.4835 314.628 43.3013 315.752 42.937L315.939 42.8641V40.0225H313.242V38.2738H313.279Z"
                              fill="white" style="stroke-dasharray: 79.0115px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.65527 21.3698C9.65527 21.3698 17.3733 17.0709 26.0654 21.3698L24.9414 23.3735C24.9414 23.3735 18.2724 18.4189 10.7418 23.3735L9.65527 21.3698Z" fill="white" class="ready" style="stroke-dasharray: 36.659px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85965 24.8668C4.85965 24.8668 -6.60493 36.5611 5.6839 49.2027C16.3992 58.3104 27.3018 51.2792 27.3018 51.2064C26.8896 50.9514 24.9414 49.8949 24.9414 49.8949C24.9414 49.8949 17.8229 55.3595 9.91755 49.2755C2.01224 43.1916 4.11033 31.2787 6.54562 27.9634L4.85965 24.8668Z" fill="white" class="ready" style="stroke-dasharray: 96.2033px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M29.1376 27.8906C29.1376 27.8906 34.5327 36.5248 28.8379 45.9604C28.8379 45.9604 31.5354 47.3083 31.7228 47.4905C31.7228 47.4905 41.3141 36.4155 30.8611 24.8304L29.1376 27.8906Z" fill="white" class="ready" style="stroke-dasharray: 50.5968px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.1948 45.2682C25.6907 45.1953 29.4748 46.9805 32.0225 48.8384C33.3712 49.8585 35.3195 52.4815 37.8671 52.0444C38.9911 51.8622 39.8903 51.6072 40.6771 51.1336C41.0518 50.8786 41.4639 50.6235 41.8385 50.3685C41.8385 50.3685 41.8385 50.3685 41.8385 50.405C40.9394 52.2994 39.5157 53.8295 37.3426 54.4852C36.9305 54.5945 36.5184 54.5945 36.0313 54.6674C35.0197 54.8131 33.9707 54.5945 33.2588 54.3031C31.0858 53.3923 29.4748 51.7893 27.639 50.5143C25.3535 48.9477 22.9182 48.037 18.9469 48.0734C18.2725 48.1098 17.5606 48.1462 16.8862 48.2191C16.1369 48.3648 15.4251 48.4377 14.7507 48.6563C14.3385 48.802 13.9639 48.9477 13.5518 49.1299C13.814 47.3448 17.111 45.9604 18.9843 45.5597C19.4714 45.4868 19.9959 45.4139 20.483 45.3775C20.7452 45.3046 20.97 45.2682 21.1948 45.2682Z"
                              fill="white" style="stroke-dasharray: 63.8802px; stroke-dashoffset: 0px;"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.09875 19.6936C4.70979 19.6936 6.35829 19.6936 7.96933 19.6936C11.2663 26.324 14.5633 32.918 17.8603 39.5484C17.8603 39.5484 17.8978 39.5484 17.8978 39.512C21.2323 32.918 24.5293 26.2876 27.8637 19.6936C29.4748 19.6936 31.0858 19.6936 32.6968 19.73C28.1635 28.0363 23.6301 36.379 19.0967 44.7216C18.3474 44.7945 17.5606 45.0131 16.9612 45.2681C12.3528 36.7433 7.70707 28.2184 3.09875 19.6936Z" fill="white" class="ready"
                              style="stroke-dasharray: 113.882px; stroke-dashoffset: 0px;"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="book-page">
    <video muted width="100%" autoplay loop poster>
        <source src="<?= get_field( 'video_top' )['url'] ?>" type='video/mp4'>
    </video>
    <div class="logo_after_video">
        <img src="<?= get_field( 'logo_after_video' )['url'] ?>">
    </div>
    <div class="iframe">
        <iframe width="100%" height="600" frameborder="0" src="//online.fliphtml5.com/emeh/ciyq/" type="text/html" allowfullscreen="true" scrolling="no" marginwidth="0" marginheight="0"></iframe>
    </div>
    <div class="preface">
        <div class="wrap-title">
            <div class="title"><?= get_field( 'title_preface' ) ?></div>
            <a href="https://quintessence-koubi.com/passer-votre-commande/" target="_blank"><?= __('Сommander le livre', 'page-book') ?></a>
        </div>
        <div class="columns">
            <div class="column">
				<?= get_field( 'column_left' ) ?>
            </div>
            <div class="column">
				<?= get_field( 'column_right' ) ?>
            </div>
        </div>
    </div>
    <div class="image_book">
        <img src="<?= get_field( 'image_book' )['url'] ?>">
    </div>
    <div class="text-after-image-book">
		<?= get_field( 'text_after_image_book' ) ?>
    </div>
    <div class="commander-btn">
        <div class="wrap">
            <a href="https://quintessence-koubi.com/passer-votre-commande/" target="_blank"><img src="<?= get_template_directory_uri() ?>/img/market.png">Сommander le livre</a>
        </div>
    </div>
    <div class="image-last">
        <video muted width="100%" autoplay loop poster>
            <source src="<?= get_field( 'last_video' )['url'] ?>" type='video/mp4'>
        </video>
    </div>
</div>
<script>
    (function ($) {
        if (localStorage.getItem('dontLoad') == null) {
            localStorage.setItem('dontLoad', 'true');
        } else {
            $('.preloader-wrapper').addClass('ready');
            $('.preloader-wrapper').css('display', 'none');
        }


        var windowHeight = $(window).height();
        var navigationFixedPosition;
        var preloaderTrigger1 = false;

        function imageSizeCover(callback) {
            var $obj = $('img[data-image-size-cover]:not(.image-ready)');

            $obj.each(function () {
                if ($(this).parent().width() > $(this).width()) {
                    $(this).removeClass('overHeightImg');
                    $(this).addClass('overWidthImg');
                } else if ($(this).parent().height() > $(this).height()) {
                    $(this).removeClass('overWidthImg');
                    $(this).addClass('overHeightImg');
                }

                //$(this).animate({opacity: '1'}, 600);
            });

            callback;
        }

        function svgPathLength($obj) {
            var $innerObj = $obj.find('path'),
                svgMethodsCounter = $innerObj.length;

            for (var i = 0; i < svgMethodsCounter; i++) {
                var $objPath = $innerObj.eq(i);

                if (!$objPath.hasClass('no-animate')) {
                    var path = $objPath[0],
                        length = path.getTotalLength();

                    $objPath.css('stroke-dasharray', length).css('stroke-dashoffset', length);
                }
            }
        }

        function preloaderOff() {
            var checkLoginTimer = setInterval(function () {
                if (preloaderTrigger1) {
                    setTimeout(function () {
                        $('.preloader-wrapper').addClass('ready');
                        $('.preloader-wrapper').animate({opacity: 0}, 600, function () {
                            $(this).css('display', 'none');
                        });
                    }, 1200);

                    clearInterval(checkLoginTimer);
                }


            }, 500);
        }

        function preloaderAnimation() {


            var timeout = 100;

            function preloaderNumberCounterLoop() {
                var startNumber = $('.animation-number-counter').text(),
                    startNumberInt = parseInt(startNumber, 10);

                var endNumber = $('.animation-number-counter').data('number-finish');

                setTimeout(function () {
                    startNumber++;

                    if (startNumber <= endNumber - 10) {
                        timeout = 100;
                    } else if (startNumber <= endNumber - 6) {
                        timeout = 200;
                    } else if (startNumber <= endNumber - 2) {
                        timeout = 400;
                    } else {
                        timeout = 600;
                    }

                    if (startNumber <= endNumber) {
                        $('.animation-number-counter').text(startNumber);

                        preloaderNumberCounterLoop();
                    } else {
                        $('.preloader-innerWrapper .bg-image img').addClass('ready');

                        setTimeout(function () {
                            var startWordCounter = 0,
                                endWordCounter = $('.preloader-innerBlock .main-title-block .subtitle-block .text-line span').length;

                            $('.preloader-innerBlock .main-title-block .title-block').animate({'opacity': '1'}, 400, function () {
                                $('.preloader-innerBlock .main-title-block .subtitle-block .text-line span')
                                    .eq(0)
                                    .animate({'opacity': '1'}, 400);

                                function preloaderWordShowLoop() {
                                    startWordCounter++;

                                    setTimeout(function () {
                                        if (startWordCounter < endWordCounter) {
                                            $('.preloader-innerBlock .main-title-block .subtitle-block .text-line span')
                                                .eq(startWordCounter)
                                                .animate({'opacity': '1'}, 200);

                                            preloaderWordShowLoop();
                                        } else {
                                            $('.preloader-innerWrapper .bg-image .svg-block.title-block').css('opacity', '1');

                                            $('.preloader-innerWrapper .bg-image .svg-block.title-block svg path').animate({'stroke-dashoffset': '0'}, 1000, "linear", function () {
                                                $(this).addClass('ready');
                                            });

                                            preloaderTrigger1 = true;

                                            //preloaderOff();
                                        }
                                    }, 400);
                                }

                                preloaderWordShowLoop();
                            });
                        }, 600);
                    }
                }, timeout);
            }

            $('.preloader-innerBlock .main-title-block .subtitle-block .number-block').animate({'opacity': '1'}, 800, function () {
                preloaderNumberCounterLoop();
            });
        }

        $(document).ready(function () {
            var elmentSvg = document.getElementById('preloader-svg-element');
            $('.preloader-innerWrapper').removeClass('loader');
            svgPathLength($('.svg-block'));
            preloaderAnimation();

            getQuantity();

            // elmentSvg.onload=function() {
            // 	svgPathLength($('.svg-block'));
            // 	preloaderAnimation();
            // }

            preloaderOff();
        });

        function getQuantity() {
            var cartQuantityNumber = $('.woocommerce-cart-form .quantity input').val();

            if (cartQuantityNumber !== undefined) {
                $('.cart-wrapper .number-line').text('+' + cartQuantityNumber);
                $('.sidebar-section .quantity-block .number-line').text(cartQuantityNumber);
                $('.info-outerWrapper .quantity-block .number-line').text(cartQuantityNumber);
            }
        }

    })(jQuery);
</script>
<?php get_footer() ?>
