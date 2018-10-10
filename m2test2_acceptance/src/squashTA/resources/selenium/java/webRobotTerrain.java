import com.gargoylesoftware.htmlunit.BrowserVersion;
import com.gargoylesoftware.htmlunit.WebClient;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
//import org.openqa.selenium.WebDriver;
import org.openqa.selenium.htmlunit.HtmlUnitDriver;

import java.util.concurrent.TimeUnit;
import java.util.logging.Level;

import static org.junit.Assert.assertEquals;
import static org.junit.Assert.fail;

public class webRobotTerrain {
    private HtmlUnitDriver driver;
    private String baseUrl;
    private StringBuffer verificationErrors = new StringBuffer();

    @Before
    public void setUp() throws Exception {
        driver = new HtmlUnitDriver() {
            @Override
            protected WebClient newWebClient(BrowserVersion version) {
                WebClient webClient = super.newWebClient(version);
                webClient.getOptions().setThrowExceptionOnScriptError(false);
                return webClient;
            }
        };
        baseUrl = "http://localhost/";
        driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
        java.util.logging.Logger.getLogger("com.gargoylesoftware").setLevel(Level.OFF);
        System.setProperty("org.apache.commons.logging.Log", "org.apache.commons.logging.impl.NoOpLog");
    }

    @Test
    public void testRobot2SelTerrain() throws Exception {

        driver.get(baseUrl + "/webRobot/Accueil.php");
        //driver.get(baseUrl + "/webRobot/Accueil.php?seed=12");
        driver.findElementById("newCarte").click();
        int oldX = Integer.valueOf(driver.findElement(By.id("xRobot")).getText());
        int oldY = Integer.valueOf(driver.findElement(By.id("yRobot")).getText());
        driver.findElement(By.linkText("Avancer")).click();
        int newX = Integer.valueOf(driver.findElement(By.id("xRobot")).getText());
        int newY = Integer.valueOf(driver.findElement(By.id("yRobot")).getText());
        assertEquals(oldX, newX);
        String s = driver.findElementByXPath("//div[@class='panel']/h3[4]").getText();

        if (Integer.valueOf(s.split(": ")[1]) != 80)
            assertEquals(oldY, newY+1);
        else // infranchissable
            assertEquals(oldY, newY);
    }

    @After
    public void tearDown() throws Exception {
        driver.quit();
        String verificationErrorString = verificationErrors.toString();
        if (!"".equals(verificationErrorString)) {
            fail(verificationErrorString);
        }
    }
}
