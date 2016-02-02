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
 * Assume that the major axis of an ellipse is always parallel to the x axis.
 *
 * @author Eriq Augustine
 * @version 1.1.0
 * @since 2016-02-01
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

      canvas.add(new Ellipse(100, 50, new Point(350, 400), new Color(128, 0, 128), true));

      // Simple call.
      // draw(canvas);

      // More detailed call.
      draw(canvas, 500, 500, Color.GRAY, "myCoolImage.ppm");
   }

   public static void draw(Canvas canvas) {
      draw(canvas, DEFAULT_BG_COLOR, DEFAULT_IMAGE_PATH);
   }

   public static void draw(Canvas canvas, Color bgColor, String filePath) {
      // Discover the canvas dimensions.
      int width = 0;
      int height = 0;

      // Scan the canvas to get the correct dimensions.
      for (int i = 0; i < canvas.size(); i++) {
         if (canvas.get(i) instanceof Ellipse) {
            Ellipse ellipse = (Ellipse)canvas.get(i);

            if (width < ellipse.getPosition().x + ellipse.getSemiMajorAxis()) {
               width = ellipse.getPosition().x + (int)Math.ceil(ellipse.getSemiMajorAxis());
            }

            if (height < ellipse.getPosition().y + ellipse.getSemiMinorAxis()) {
               height = ellipse.getPosition().y + (int)Math.ceil(ellipse.getSemiMinorAxis());
            }
         } else {
            ConvexPolygon polygon = (ConvexPolygon)canvas.get(i);

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
    * On the boundary counts as in.
    */
   private static boolean isIn(Point point, Shape shape) {
      if (shape instanceof Ellipse) {
         return isIn(point, (Ellipse)shape);
      }

      return isIn(point, (ConvexPolygon)shape);
   }

   private static boolean isIn(Point point, Ellipse ellipse) {
      double majorAxis = Math.pow(point.x - ellipse.getPosition().x, 2) / Math.pow(ellipse.getSemiMajorAxis(), 2);
      double minorAxis = Math.pow(point.y - ellipse.getPosition().y, 2) / Math.pow(ellipse.getSemiMinorAxis(), 2);

      return majorAxis + minorAxis <= 1;
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
