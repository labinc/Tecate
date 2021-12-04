@if(session('error'))
 <script>
  const toasted = new Toasted({
   duration: 5000,
   position: "bottom-right",
   theme: "bootstrap",
   type: "error"
  })

  toasted.show("{{ session('error') }}");
 </script>
@elseif(session('success'))
 <script>
  const toasted = new Toasted({
   duration: 5000,
   position: "bottom-right",
   theme: "bulma",
   type: "success"
  })

  toasted.show("{{ session('success') }}");
 </script>
@elseif(session('warning'))
 <script>
  const toasted = new Toasted({
   duration: 5000,
   position: "bottom-right",
   theme: "alive",
   type: "info"
  })

  toasted.show("{{ session('warning') }}");
 </script>
@endif
