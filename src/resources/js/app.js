import './bootstrap';

const searchForm = document.querySelector('form[name=searchForm]');
const tableWrapper = document.querySelector("div[class=tableWrapper]");

if (searchForm)
    searchForm.addEventListener('submit', function(event)
    {
        event.preventDefault();
        sendAjaxRequest(window.location.origin+'/search', new FormData(searchForm), onSearch);
    });

function sendAjaxRequest(url='', postData=null, callback)
{
    let headers = {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
    }
    if(url === '' || postData === undefined  || callback === '') return false;
    tableWrapper.innerHTML = '';
    fetch(url, {
        method: 'post',
        body: postData,
        headers: headers
    }).then((response) => {
        return (response.json());
    }).then((res) => {
        if (res.status === 201) {
            console.log(res);
        }
        callback(JSON.parse(res));
    }).catch((error) => {
        console.log(error);
    })
}

function onSearch(data = '')
{
    if (data.length > 0){

        let tableHtml = `
                <table class="table table-striped table-hover mt-5">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Storeys</th>
                        <th>Garages</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
            `;
        data.forEach(function(row) {
            tableHtml += `
                    <tr>
                        <td>${row.name}</td>
                        <td>${row.bedrooms}</td>
                        <td>${row.bathrooms}</td>
                        <td>${row.storeys}</td>
                        <td>${row.garages}</td>
                        <td>$${row.price}</td>
                    </tr>
            `;  ``
        });
        tableHtml += `
                    </tbody>
                </table>
            `;
        tableWrapper.innerHTML = tableHtml;
    }

}

