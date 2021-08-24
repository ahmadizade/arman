<div class="loader">
    <svg version="1.1" id="preloader" class="svg-loader" x="0px" y="0px" width="240px" height="120px" viewBox="0 0 240 120">

    <style type="text/css" >
        .loader {
            opacity: 0;
            pointer-events: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            background-color: rgba(33, 55, 80, 0.9);
            transition: all 0.4s;
        }
        .loader.active{
            opacity: 1;
            pointer-events: visible;
            transition: all 1s;
        }
         .svg-loader {
            position: absolute;
            width: 240px;
            height: 120px;
            top: 0; right: 0;
            bottom: 0; left: 0;
            margin: auto;
        }
        .credit {
            position: absolute;
            bottom: 50px;
            width: 100%;
            text-align: center;
        }

        .credit a {
            color: #F0220B;
            font: 800 75% "Open Sans", sans-serif;
            text-transform: uppercase;
            text-decoration: none;
        }

        /*<![CDATA[*/

        #plug,
        #socket { fill:#F0220B }

        #loop-normal { fill: none; stroke: #F0220B; stroke-width: 12 }
        #loop-offset { display: none }

        /*]]>*/
    </style>

    <path id="loop-normal" class="st1" d="M120.5,60.5L146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5
L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0z">
        <animate attributeName="stroke-dasharray" attributeType="XML"
                 from="500, 50"  to="450 50"
                 begin="0s" dur="2s"
                 repeatCount="indefinite"/>
        <animate attributeName="stroke-dashoffset" attributeType="XML"
                 from="-40"  to="-540"
                 begin="0s" dur="2s"
                 repeatCount="indefinite"/>
    </path>

    <path id="loop-offset" d="M146.48,87.02c14.64,14.64,38.39,14.65,53.03,0s14.64-38.39,0-53.03s-38.39-14.65-53.03,0L120.5,60.5
L94.52,87.02c-14.64,14.64-38.39,14.64-53.03,0c-14.64-14.64-14.64-38.39,0-53.03c14.65-14.64,38.39-14.65,53.03,0L120.5,60.5
L146.48,87.02z"/>

    <path id="socket" d="M7.5,0c0,8.28-6.72,15-15,15l0-30C0.78-15,7.5-8.28,7.5,0z"/>

    <path id="plug" d="M0,9l15,0l0-5H0v-8.5l15,0l0-5H0V-15c-8.29,0-15,6.71-15,15c0,8.28,6.71,15,15,15V9z"/>

    <animateMotion
        xlink:href="#plug"
        dur="2s"
        rotate="auto"
        repeatCount="indefinite"
        calcMode="linear"
        keyTimes="0;1"
        keySplines="0.42, 0, 0.58, 1">
        <mpath xlink:href="#loop-normal"/>
    </animateMotion>

    <animateMotion
        xlink:href="#socket"
        dur="2s"
        rotate="auto"
        repeatCount="indefinite"
        calcMode="linear"
        keyTimes="0;1"
        keySplines="0.42, 0, 0.58, 1">
        <mpath xlink:href="#loop-offset"/>
    </animateMotion>
</svg>
    <div class="credit text-center d-none">
        <i class="fa fa-spin fa-spinner text-netran-yellow"></i>
        <br>
        <a href="netran.net" target="_blank">WWW.Netran.Net</a>
    </div>
</div>
