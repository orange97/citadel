using UnityEngine;
using System.Collections;

[RequireComponent(typeof(CharacterController))]
public class RobotController : MonoBehaviour
{
    public float speed = 6.0F;
    public float jumpSpeed = 8.0F;
    public float rotateSpeed = 1.0F;
    public float gravity = 20.0F;
    public GameObject model;
    public Transform antenna;
    public string idle = "idle";
    public string walk = "walk";
    public string scan = "scan";
    public string leanRight = "leanRight";
    public string leanLeft = "leanLeft";

    void Start()
    {
        model.animation[idle].layer = 0;
        model.animation[walk].layer = 0;
        model.animation[scan].layer = 3;
        model.animation[scan].AddMixingTransform(antenna);
        model.animation[leanRight].layer = 4;
        model.animation[leanLeft].layer = 4;
        model.animation[leanRight].blendMode = AnimationBlendMode.Additive;
        model.animation[leanLeft].blendMode = AnimationBlendMode.Additive;
        model.animation[leanRight].enabled = true;
        model.animation[leanLeft].enabled = true;
        model.animation[leanRight].weight = 1.0f;
        model.animation[leanLeft].weight = 1.0f;
        model.animation[idle].wrapMode = WrapMode.Loop;
        model.animation[walk].wrapMode = WrapMode.Loop;
        model.animation[scan].wrapMode = WrapMode.Once;
        model.animation[leanRight].wrapMode = WrapMode.ClampForever;
        model.animation[leanLeft].wrapMode = WrapMode.ClampForever;
        model.animation.Stop();
    }

    void Update()
    {

        CharacterController controller = GetComponent<CharacterController>();
        transform.Rotate(0, Input.GetAxis("Horizontal") * rotateSpeed, 0);
        Vector3 forward = transform.TransformDirection(Vector3.forward);
        float curSpeed = speed * Input.GetAxis("Vertical");
        controller.SimpleMove(forward * curSpeed);


        if (Input.GetAxis("Vertical") >= 0)
        {
            model.animation[walk].speed = 1;
        }
        else
        {
            model.animation[walk].speed = -1;
        }

        if (controller.velocity.x != 0 || controller.velocity.z != 0)
        {
            model.animation.CrossFade(walk);
        }
        else
        {
            model.animation.CrossFade(idle);
        }

        var lean = Input.GetAxis("Horizontal");
        model.animation[leanLeft].normalizedTime = -lean;
        model.animation[leanRight].normalizedTime = lean;
        model.animation.Blend(leanLeft, 1f, 1f);
        model.animation.Blend(leanRight, 1f, 1f);

        if (Input.GetButton("Fire1"))
            model.animation.Play(scan);

    }
}