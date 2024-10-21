@extends('layouts.master')

@section('content')
<div class="terms-condition-saction commmon-pdf-class">
   <div class="container">
      @php
       $pdf = $cookies_pdf->pdf;
      @endphp
      <canvas id="pdf-canvas"></canvas>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
   <script>
        const baseUrl = '{{ url('public/pagesettings') }}';
        const pdfFileName = '<?php echo $pdf; ?>'; 
        const url = `${baseUrl}/${pdfFileName}`; // Replace with your PDF URL
         const pdfjsLib = window['pdfjs-dist/build/pdf'];
         pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

         const loadingTask = pdfjsLib.getDocument(url);
         loadingTask.promise.then(pdf => {
               pdf.getPage(1).then(page => {
                  const scale = 1.5;
                  const viewport = page.getViewport({ scale: scale });
                  const canvas = document.getElementById('pdf-canvas');
                  const context = canvas.getContext('2d');
                  canvas.height = viewport.height;
                  canvas.width = viewport.width;

                  const renderContext = {
                     canvasContext: context,
                     viewport: viewport
                  };
                  page.render(renderContext);
               });
         });
   </script>
@endsection
