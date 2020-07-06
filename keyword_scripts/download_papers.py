import csv
import shutil
import urllib.request

# Load CSV
with open("../masterdatafinal.csv") as file:
    csv_contents = list(csv.reader(file))

# Remove header, get URL index
header = csv_contents.pop(0)
id_index = header.index("Id")
url_index = header.index("URL")

# Download PDFs
for row in csv_contents:
    # Get ID, URL
    paper_id = row[id_index]
    paper_url = row[url_index]

    # For arXiv: prefer PDF
    paper_url = paper_url.replace("arxiv.org/abs", "arxiv.org/pdf")

    # Try to open URL
    try:
        sock = urllib.request.urlopen(paper_url)
    except Exception as e:
        print("Paper {paper_id} download failed")
        print(e)
        continue

    # Write to file
    extension = sock.info().get_content_type().rpartition("/")[2]
    target_path = f"papers/{paper_id}.{extension}"
    with open(target_path, "wb") as target:
        shutil.copyfileobj(fsrc=sock, fdst=target)
    print("Downloaded:", target_path)
