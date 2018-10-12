import org.junit.*;
import org.openqa.selenium.By;
import org.openqa.selenium.htmlunit.HtmlUnitDriver;

import static org.junit.Assert.assertEquals;

public class exempleSeleniumTest
{
    private HtmlUnitDriver driver;
    private String baseUrl;
    private String valX;
    public void setUp() throws Exception {
        driver = new HtmlUnitDriver();
        baseUrl = "https://disc.univ-fcomte.fr";
    }
    public void testRobotSeleniumTest() throws Exception {
        driver.get("https://disc.univ-fcomte.fr/m2gl-webRobot/Accueil.php?seed=1");
        driver.findElement(By.id("newCarte")).click();
        driver.findElement(By.linkText("Tourner gauche")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Tourner droite")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Avancer")).click();
        driver.findElement(By.linkText("Reculer")).click();
        assertEquals("6", driver.findElement(By.id("energy")).getText());
    }
}