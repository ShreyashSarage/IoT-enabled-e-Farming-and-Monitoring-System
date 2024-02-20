import pymysql
from flask import Flask, render_template
from matplotlib.figure import Figure
from matplotlib.backends.backend_agg import FigureCanvasAgg as FigureCanvas
import io

# MySQL Settings
MYSQL_HOST = 'localhost'
MYSQL_USER = 'root'
MYSQL_PASSWORD = 'root'
MYSQL_DB = 'cloud'
MYSQL_TABLE = 'ESP32'
MYSQL_COLUMN_X = 'x_column'
MYSQL_COLUMN_Y = 'y_column'

app = Flask(__name__)

# Function to fetch data from MySQL
def fetch_data():
    connection = pymysql.connect(host=MYSQL_HOST,
                                 user=MYSQL_USER,
                                 password=MYSQL_PASSWORD,
                                 database=MYSQL_DB)
    cursor = connection.cursor()
    cursor.execute(f"SELECT * FROM {MYSQL_TABLE}")
    data = cursor.fetchall()
    cursor.close()
    connection.close()
    return data

# Function to generate the plot
def generate_plot():
    data = fetch_data()
    x_data = [row[0] for row in data]
    y_data = [row[1] for row in data]

    fig = Figure()
    axis = fig.add_subplot(1, 1, 1)
    axis.plot(x_data, y_data, marker='o')
    axis.set_xlabel('X Axis')
    axis.set_ylabel('Y Axis')
    axis.set_title('Real-time Data Visualization')
    axis.grid(True)

    canvas = FigureCanvas(fig)
    img = io.BytesIO()
    fig.savefig(img)
    img.seek(0)
    return img

@app.route('/')
def index():
    return render_template('/index.html')

@app.route('/plot.png')
def plot_png():
    img = generate_plot()
    return img.getvalue(), 200, {'Content-Type': 'image/png'}

if __name__ == '__main__':
    app.run(debug=True)