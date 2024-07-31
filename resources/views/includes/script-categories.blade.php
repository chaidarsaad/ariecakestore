<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
        });

        var route = "{{ url('autocomplete-search-category') }}";

        $('#search').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            },
            updater: function(item) {
                window.location.href = "/category/" + item.slug;
                return item;
            }
        });
    });
</script>
