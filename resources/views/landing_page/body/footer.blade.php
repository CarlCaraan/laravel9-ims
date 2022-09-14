 <footer id="footer">
     <div class="container">
         <div class="row pt-4">
             <div class="col-md-8">
                 <div class="center">
                     {!! $userSiteInfos->footer !!}
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="center">
                     <span><i class="fas fa-map-marker-alt icon-custom me-1"></i> {!! $userSiteInfos->address !!}</span>
                 </div>
                 <div class="center pt-4">
                     <div id="google_translate_element"></div>
                 </div>
             </div>
             <div class="copyright">
                 <span class="text-muted">
                     Copyright &copy; {{ date('Y', strtotime(now())) }} <strong>Division of Laguna</strong> All Rights Reserved
                 </span>
             </div>

         </div>
 </footer>