/* ------------------------------------------------------------------------------
*
*  # Session timeout
*
*  Specific JS code additions for extra_session_timeout.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {
  // Idle timeout
  $.sessionTimeout({
    heading: "h5",
    title: "Session Timeout",
    message: "Your session is about to expire. Do you want to stay connected?",
    // warnAfter: 6000000, // (1.40 minutes)
    // redirAfter: 7200000, // ((two hours))
    warnAfter: 1500, // (1.40 minutes)
    redirAfter: 10000, // ((two hours))
    keepAliveUrl: "/",
    redirUrl: "../auth/logout",
    logoutUrl: "../auth/logout"
  });
});
