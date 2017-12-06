<style>
    .handle div.drag {
        width: 7px;
        min-height: 25px;
        margin-right: 4px;
        background: 0 0 transparent url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFAgMAAADwAc52AAAAA3NCSVQICAjb4U/gAAAACVBMVEWZmZn////MzMwyR5LcAAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M1cbXjNgAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMS8xMy8xN9yqzvYAAAARSURBVAiZY2B1YFB1YAiFIgAPpwJqzAWWIwAAAABJRU5ErkJggg==') repeat;
        margin-bottom: 2px;
        cursor: move;
        position: absolute;
        top: 5px;
        bottom: 0;
    }

    body {
        background-color: #fff;
        padding-top: 70px;
    }

    .sidebar {
        position: fixed;
        top: 51px;
        bottom: 0;
        left: 0;
        z-index: 1000;
        display: block;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        background-color: #f5f5f5;
        border-right: 1px solid #eee;
        padding-top: 19px;
    }

    .nav-sidebar {
        margin-right: -21px; /* 20px padding + 1px border */
        margin-bottom: 20px;
        margin-left: -20px;
    }

    .nav-sidebar > .active > a,
    .nav-sidebar > .active > a:hover,
    .nav-sidebar > .active > a:focus {
        text-decoration: none;
        color: #fff;
        background-color: #424242;
    }

    .nav > li > a:focus,
    .nav > li > a:hover {
        background-color: #eee;
    }
</style>