<div class="my-2 d-flex justify-end">
    <div class="w-25">
        <form>
            <div class="d-flex items-center">
                <div class="w-25">Fetch:</div>
                <select class="w-75 form-control" name="status" onchange="this.form.submit()">
                    <option {{ $statusName == "" ? 'selected' : '' }}>All</option>
                    <option {{ $statusName == "Active" ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $statusName == "Pending" ? 'selected' : '' }} value="0">Pending</option>
                </select>
            </div>
            <noscript>
                <button class="btn btn-block border border-dark hover:bg-black hover:text-white"
                    type="submit">Go</button>
            </noscript>
        </form>
    </div>
</div>
