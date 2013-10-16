/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */(function(e,t){var n=e.jQuery||e.Cowboy||(e.Cowboy={}),r;n.throttle=r=function(e,r,i,s){function a(){function p(){u=+(new Date);i.apply(n,l)}function v(){o=t}var n=this,a=+(new Date)-u,l=arguments;s&&!o&&p();o&&clearTimeout(o);s===t&&a>e?p():r!==!0&&(o=setTimeout(s?v:p,s===t?e-a:e))}var o,u=0;if(typeof r!="boolean"){s=i;i=r;r=t}n.guid&&(a.guid=i.guid=i.guid||n.guid++);return a};n.debounce=function(e,n,i){return i===t?r(e,n,!1):r(e,i,n!==!1)}})(this);