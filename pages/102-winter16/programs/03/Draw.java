import java.awt.Color;
import java.awt.Point;
import java.io.FileWriter;
import java.io.IOException;
import java.util.List;

/**
 * Turn you Canvas into an image!
 * See the main() for an example of turning a Canvas into a beautiful image.
 * There is no restriction on the size or dimensions of the canvas.
 * Dimensions will be automatically infered.
 * You can also set the background color!
 * Output format is PPM.
 *
 * Too lazy to do non-filled shapes, this will just fill them all.
 *
 * @author Eriq Augustine
 * @version 1.0.0
 * @since 2016-01-25
 */
public class Draw {
   public static final String DEFAULT_IMAGE_PATH = "image.ppm";
   public static final Color DEFAULT_BG_COLOR = Color.WHITE;

   public static void main(String[] args) {
      Canvas canvas = new Canvas();

      canvas.add(new Circle(100, new Point(250, 250), Color.BLACK, true));
      canvas.add(new Rectangle(50, 50, new Point(50, 50), Color.RED, true));
      canvas.add(new Triangle(new Point(350, 50), new Point(300, 100),
                              new Point(400, 100), Color.GREEN, true));
      canvas.add(
         new ConvexPolygon(new Point[]{
            new Point(100, 300),
            new Point(150, 300),
            new Point(170, 330),
            new Point(170, 380),
            new Point(150, 410),
            new Point(100, 410),
            new Point(80, 380),
            new Point(80, 330)
         }, Color.BLUE, true));
      canvas.add(new Circle(20, new Point(125, 355), Color.YELLOW, true));

      // Simple call.
      draw(canvas);

      // More detailed call.
      draw(canvas, 500, 500, Color.GRAY, "myCoolImage.ppm");
   }

   public static void draw(Canvas canvas) {
      draw(canvas, DEFAULT_BG_COLOR, DEFAULT_IMAGE_PATH);
   }

   public static void draw(Canvas canvas, Color bgColor, String filePath) {
      canvas = optimizeCanvas(canvas);

      // Discover the canvas dimensions.
      int width = 0;
      int height = 0;

      // Scan the canvas to get the correct dimensions.
      for (int i = 0; i < canvas.size(); i++) {
         if (canvas.get(i).getClass().getName().equals("Circle")) {
            Circle circle = (Circle)canvas.get(i);

            if (width < circle.getPosition().x + circle.getRadius()) {
               width = circle.getPosition().x + (int)circle.getRadius();
            }

            if (height < circle.getPosition().y + circle.getRadius()) {
               height = circle.getPosition().y + (int)circle.getRadius();
            }
         } else {
            ConvexPolygon polygon = toPolygon(canvas.get(i));

            for (int j = 0; j < polygon.numVertices(); j++) {
               if (width < polygon.getVertex(j).x) {
                  width = polygon.getVertex(j).x;
               }

               if (height < polygon.getVertex(j).y) {
                  height = polygon.getVertex(j).y;
               }
            }
         }
      }

      draw(canvas, width, height, bgColor, filePath);
   }

   public static void draw(Canvas canvas, int width, int height, Color bgColor, String filePath) {
      Color[] image = getBase(width, height, bgColor);
      canvas = optimizeCanvas(canvas);

      for (int i = 0; i < canvas.size(); i++) {
         drawShape(image, width, canvas.get(i));
      }

      try {
         writeImage(image, width, filePath);
      } catch (IOException ex) {
         System.err.println("Unable to write image: " + ex);
         ex.printStackTrace();
      }
   }

   /**
    * Speed things up a bit by doing the polygon conversion upfront.
    */
   public static Canvas optimizeCanvas(Canvas canvas) {
      Canvas newCanvas = new Canvas();

      for (int i = 0; i < canvas.size(); i++) {
         if (canvas.get(i).getClass().getName().equals("Circle")) {
            newCanvas.add(canvas.get(i));
         } else {
            newCanvas.add(toPolygon(canvas.get(i)));
         }
      }

      return newCanvas;
   }

   /**
    * Draw |shape| into |image|, overwriting anything that is already there.
    * We are being pretty lazy/inefficient and just checking every pixel.
    *
    * @todo Pay attention to fill status.
    */
   private static void drawShape(Color[] image, int width, Shape shape) {
      for (int row = 0; row < image.length / width; row++) {
         for (int col = 0; col < width; col++) {
            if (isIn(new Point(col, row), shape)) {
               image[coordinatesToIndex(row, col, width)] = shape.getColor();
            }
         }
      }
   }

   /**
    * Check if a point in a shape.
    * All non-circle shapes will just be converted to a convex polygon.
    * On the boundary counts as in.
    */
   private static boolean isIn(Point point, Shape shape) {
      if (shape.getClass().getName().equals("Circle")) {
         return isIn(point, (Circle)shape);
      }

      return isIn(point, toPolygon(shape));
   }

   private static boolean isIn(Point point, Circle circle) {
      return Math.abs(point.distance(circle.getPosition())) <= circle.getRadius();
   }

   /**
    * Use the WRF method: https://www.ecse.rpi.edu/Homepages/wrf/Research/Short_Notes/pnpoly.html
    */
   private static boolean isIn(Point point, ConvexPolygon polygon) {
      int i = 0;
      int j = 0;
      boolean c = false;

      for (i = 0, j = polygon.numVertices() - 1; i < polygon.numVertices(); j = i++) {
         if (((polygon.getVertex(i).y > point.y) != (polygon.getVertex(j).y > point.y)) &&
             (point.x < (
               (polygon.getVertex(j).x - polygon.getVertex(i).x) *
               (point.y - polygon.getVertex(i).y) /
               (polygon.getVertex(j).y - polygon.getVertex(i).y) + polygon.getVertex(i).x))) {
            c = !c;
         }
      }

      return c;
   }

   private static ConvexPolygon toPolygon(Shape shape) {
      if (shape.getClass().getName().equals("ConvexPolygon")) {
         return (ConvexPolygon)shape;
      }

      if (shape.getClass().getName().equals("Circle")) {
         throw new IllegalArgumentException("Can't turn a Circle into a Polygon!");
      }

      Point[] points;
      if (shape.getClass().getName().equals("Triangle")) {
         Triangle triangle = (Triangle)shape;

         points = getOrderedPoints(triangle);
      } else {
         // Rectangle
         Rectangle rect = (Rectangle)shape;
         points = new Point[]{
            rect.getPosition(),
            new Point(rect.getPosition().x + rect.getWidth(), rect.getPosition().y),
            new Point(rect.getPosition().x + rect.getWidth(),
                      rect.getPosition().y + rect.getHeight()),
            new Point(rect.getPosition().x, rect.getPosition().y + rect.getHeight())
         };
      }

      return new ConvexPolygon(points, shape.getColor(), shape.getFilled());
   }

   /**
    * Get the points from a triangle in counter-clockwise order.
    * ConvexPolygon wants the points in CCW order to make computations easier.
    */
   public static Point[] getOrderedPoints(Triangle triangle) {
      // Check for the winding order of the triangle.
      // (Since we onyl have three points, we can guarentee the are alreay in CW or CCW order.
      Point a = triangle.getVertexA();
      Point b = triangle.getVertexB();
      Point c = triangle.getVertexC();

      Point aToB = new Point(b.x - a.x, b.y - a.y);
      Point bToC = new Point(c.x - b.x, c.y - b.y);

      double cross = aToB.x * bToC.y - aToB.y * bToC.x;
      if (cross > 0) {
         // Clockwise, need to revers.
         return new Point[]{c, b, a};
      } else {
         // Counter-clockwise, good to go.
         return new Point[]{a, b, c};
      }
   }

   /**
    * Get the base/background image.
    */
   private static Color[] getBase(int width, int height, Color bgColor) {
      Color[] image = new Color[width * height];

      for (int row = 0; row < height; row++) {
         for (int col = 0; col < width; col++) {
            image[coordinatesToIndex(row, col, width)] = bgColor;
         }
      }

      return image;
   }

   private static int coordinatesToIndex(int row, int col, int width) {
      return row * width + col;
   }

   private static void writeImage(Color[] image, int width, String filePath) throws IOException {
      FileWriter writer = new FileWriter(filePath);

      writer.write("P3\n"); // Magic number
      writer.write(String.format("%d %d\n", width, image.length / width)); // Width, Height
      writer.write("255\n"); // Color intensity

      for (int row = 0; row < image.length / width; row++) {
         for (int col = 0; col < width; col++) {
            int index = coordinatesToIndex(row, col, width);
            writer.write(String.format("%3d %3d %3d", image[index].getRed(),
                                       image[index].getGreen(), image[index].getBlue()));

            // Make it look nice and not have trailing whitespace.
            if (col != width - 1) {
               writer.write("   ");
            } else {
               writer.write("\n");
            }
         }
      }

      writer.close();
   }
}
