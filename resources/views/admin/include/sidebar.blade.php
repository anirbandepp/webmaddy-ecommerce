<?php
// finds the last URL segment
$urlArray = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $urlArray);
$numSegments = count($segments);
$currentSegment = $segments[$numSegments - 1];
if ($currentSegment == 'master-height') {
    $segment_uri = 'active';
    $seg_css = 'block';
} else {
    $segment_uri = '';
    $seg_css = 'none';
}
?>

<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li><a href="#"><i class="icon-meter2"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="{{ route('administrator.category.list_category') }}"><i class="icon-price-tags"></i>
                            <span>Category</span></a>
                    </li>
                    <li>
                        <a href="{{ route('administrator.category.list_sub_category') }}">
                            <i class="icon-price-tags"></i>
                            <span>Sub Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-price-tags"></i> <span>Products</span></a>
                        <ul>
                            <li><a href="{{ route('administrator.product.product_list') }}">All Products</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('administrator.coupon.coupon_list') }}">
                            <i class="icon-users2"></i>
                            <span>Coupon</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('administrator.social_link.social_link_list') }}">
                            <i class="icon-users2"></i>
                            <span>Social Links</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('administrator.customer_activity.customer_list') }}">
                            <i class="icon-users2"></i>
                            <span>Customer</span>
                        </a>
                    </li>

                    <li>
                        <a href="#"><i class="icon-cart"></i> <span>Orders</span> </a>
                        <ul>
                            <li>
                                <a href="{{ route('administrator.order.order_list') }}">
                                    All Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'pending']) }}">
                                    Pending Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'processing']) }}">
                                    Processing Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'shipped']) }}">
                                    Shipped Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'complete']) }}">
                                    Completed Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'cancelled']) }}">
                                    Cancelled Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('administrator.order.order_status', ['status' => 'review']) }}">
                                    Review Orders
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-megaphone"></i> <span>Vendors</span></a>
                        <ul>
                            <li>
                                <a href="{{ route('administrator.vendor.vendor_list') }}">
                                    All Vendors
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-list-unordered"></i> <span>Transactions</span></a>
                        <ul>
                            <li><a href="#">All Transactions</a></li>
                            <li><a href="#">Settlements</a></li>
                            <li><a href="#">Pending Settlements</a></li>
                            <li><a href="#">Payment Details</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-cog"></i> <span>Settings</span> </a>
                        <ul>
                            <li><a href="attributes.php">Attributes</a></li>
                            <li><a href="#">Manage Sizes</a></li>
                            <li><a href="taxes.php">Taxes</a></li>
                            <li><a href="delivery-charges.php">Delivery Services</a></li>
                            <li><a href="#">Delivery Charges</a></li>
                        </ul>
                    </li>

                    <li class="navigation-header"><span>Mobile Application</span> <i class="icon-menu" title=""
                            data-original-title="Forms"></i></li>

                    <li><a href="#"><i class="icon-equalizer2"></i> <span>App Settings</span></a></li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
