import pymysql
from flask import Flask, render_template
from matplotlib.figure import Figure
from matplotlib.backends.backend_agg import FigureCanvasAgg as FigureCanvas
import io

# MySQL Settings
MYSQL_HOST = 'localhost'
MYSQL_USER = 'project'
MYSQL_PASSWORD = 'diot'
MYSQL_DB = 'esp32'
MYSQL_TABLE = 'sensor_value'
MYSQL_COLUMN_X = 'temperature'
MYSQL_COLUMN_Y = 'id'

app = Flask(__name__)

# Function to fetch data from MySQL
def fetch_data():
    connection = pymysql.connect(host=MYSQL_HOST,
                                 user=MYSQL_USER,
                                 password=MYSQL_PASSWORD,
                                 database=MYSQL_DB)
    cursor = connection.cursor()
    cursor.execute(f"SELECT * FROM {MYSQL_TABLE} order by id desc limit 5")
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

def generate_plot_2():
    data = fetch_data()
    x_data = [row[0] for row in data]
    y_data = [row[3] for row in data]

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

@app.route('/temp')
def index():
    return render_template('/visualisation.php')

@app.route('/moist')
def index_2():
    return render_template('/visualisation_2.php')

@app.route('/plot.png')
def plot_png():
    img = generate_plot()
    return img.getvalue(), 200, {'Content-Type': 'image/png'}

@app.route('/plot_2.png')
def plot_png_2():
    img = generate_plot_2()
    return img.getvalue(), 200, {'Content-Type': 'image/png'}

if __name__ == '__main__':
    app.run(debug=True)