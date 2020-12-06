<form role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
    <label class="screen-reader-text" for="s">Поиск: </label>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Что ищите?" />
    <button class="light-gray-btn softer-btn" type="submit" id="searchsubmit"><span><svg width=17 height=17 viewBox="0 0 17 17" fill=none xmlns=http://www.w3.org/2000/svg> <path fill-rule=evenodd clip-rule=evenodd d="M0.515625 7.65069C0.515625 3.65322 3.75625 0.412598 7.75372 0.412598C11.7512 0.412598 14.9918 3.65322 14.9918 7.65069C14.9918 9.37496 14.3888 10.9584 13.3823 12.2018L16.1809 15.0003C16.4784 15.2979 16.4784 15.7803 16.1809 16.0779C15.8833 16.3754 15.401 16.3754 15.1034 16.0779L12.3048 13.2793C11.0615 14.2858 9.47799 14.8888 7.75372 14.8888C3.75625 14.8888 0.515625 11.6482 0.515625 7.65069ZM7.75372 1.93641C4.59782 1.93641 2.03943 4.49479 2.03943 7.65069C2.03943 10.8066 4.59782 13.365 7.75372 13.365C10.9096 13.365 13.468 10.8066 13.468 7.65069C13.468 4.49479 10.9096 1.93641 7.75372 1.93641ZM5.05998 4.57597C5.74856 3.88743 6.70198 3.46022 7.75372 3.46022C8.80545 3.46022 9.7589 3.88743 10.4474 4.57598C10.745 4.87353 10.745 5.35594 10.4474 5.65348C10.1499 5.95102 9.66747 5.95102 9.36995 5.65348C8.95547 5.23902 8.38511 4.98403 7.75372 4.98403C7.12234 4.98403 6.55195 5.23902 6.13744 5.6535C5.83988 5.95103 5.35748 5.95101 5.05995 5.65346C4.76241 5.3559 4.76243 4.8735 5.05998 4.57597Z" fill=#656565 /></svg></span></button>
</form>